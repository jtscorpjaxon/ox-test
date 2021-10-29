<?php
/**
 * Author Maxamadjonov Jaxongir.
 * https://github.com/jtscorpjaxon
 * Date: 27.10.2021
 * Time: 15:38
 */

namespace App\Controller\Api;

use App\Controller\ApiController;
use App\Entity\Products;
use App\Entity\ProductVariations;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class PostController
 * @package App\Controller
 * @Route("/api", name="post_api")
 */
class ProductsController extends ApiController
{
    public function access()
    {
        if (!in_array($this->getUser()->getRole(), ["admin", "owner"])) {
            return $this->response([
                "code" => 401,
                "message" => "Access Denied"
            ]);
        }
return [];
    }

    /**
     * @param ProductsRepository $productRepository
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/products", name="products", methods={"GET"})
     */
    public function getProductss(ProductsRepository $productRepository)
    {
        if(!empty($this->access()))
            return  $this->access();
        $data = $productRepository->findAll();
        return $this->response($data);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param ProductsRepository $productRepository
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     * @Route("/products", name="products_add", methods={"POST"})
     */
    public function addProducts(Request $request, EntityManagerInterface $entityManager, ProductsRepository $productRepository)
    {
         if(!empty($this->access()))
            return  $this->access();
        try {
            $request = $this->transformJsonBody($request);

            if (!$request || !$request->get('name') || !$request->request->get('description')) {
                throw new \Exception();
            }

            $product = new Products();
            $product->setName($request->get('name'));
            $product->setDescription($request->get('description'));
            $product->setSku($request->get('sku'));
            $product->setRating($request->get('rating'));
            $product->setQuantity($request->get('quantity'));
            foreach ($request->get('variations') as $item) {
                $variation = new ProductVariations();
                $variation->setQuantity($item['quantity']);
                $variation->setPrice($item['price']);
                $variation->setProductAttributeValueIds($item['attribute_ids']);
                $entityManager->persist($variation);
                $product->addProductId($variation);
            }

            $entityManager->persist($product);
            $entityManager->flush();

            $data = [
                'status' => 200,
                'success' => "Product added successfully",
            ];
            return $this->response($data);

        } catch (\Exception $e) {
            $data = [
                'status' => 422,
                'errors' => "Data no valid",
            ];
            return $this->response($data, 422);
        }

    }


    /**
     * @param ProductsRepository $productRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/products/{id}", name="products_get", methods={"GET"})
     */
    public function getProducts(ProductsRepository $productRepository, $id)
    {
         if(!empty($this->access()))
            return  $this->access();
        $product = $productRepository->find($id);

        if (!$product) {
            $data = [
                'status' => 404,
                'errors' => "Products not found",
            ];
            return $this->response($data, 404);
        }
        return $this->response($product);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param ProductsRepository $productRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/products/{id}", name="products_put", methods={"PUT"})
     */
    public function updateProducts(Request $request, EntityManagerInterface $entityManager, ProductsRepository $productRepository, $id)
    {
         if(!empty($this->access()))
            return  $this->access();
        try {
            $product = $productRepository->find($id);

            if (!$product) {
                $data = [
                    'status' => 404,
                    'errors' => "Products not found",
                ];
                return $this->response($data, 404);
            }

            $request = $this->transformJsonBody($request);

            if (!$request || !$request->get('name') || !$request->request->get('description')) {
                throw new \Exception();
            }

            $product->setName($request->get('name'));
            $product->setDescription($request->get('description'));
            $product->setSku($request->get('sku'));
            $product->setRating($request->get('rating'));
            $product->setQuantity($request->get('quantity'));
            foreach ($request->get('variations') as $item) {
                $variation = new ProductVariations();
                $variation->setQuantity($item['quantity']);
                $variation->setPrice($item['price']);
                $variation->setProductAttributeValueIds($item['attribute_ids']);
                $entityManager->persist($variation);
                $product->addProductId($variation);
            }

            $entityManager->flush();

            $data = [
                'status' => 200,
                'errors' => "Products updated successfully",
            ];
            return $this->response($data);

        } catch (\Exception $e) {
            $data = [
                'status' => 422,
                'errors' => "Data no valid",
            ];
            return $this->response($data, 422);
        }

    }


    /**
     * @param ProductsRepository $productRepository
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/products/{id}", name="products_delete", methods={"DELETE"})
     */
    public function deleteProducts(EntityManagerInterface $entityManager, ProductsRepository $productRepository, $id)
    {
         if(!empty($this->access()))
            return  $this->access();
        $product = $productRepository->find($id);

        if (!$product) {
            $data = [
                'status' => 404,
                'errors' => "Products not found",
            ];
            return $this->response($data, 404);
        }

        $entityManager->remove($product);
        $entityManager->flush();
        $data = [
            'status' => 200,
            'errors' => "Products deleted successfully",
        ];
        return $this->response($data);
    }

}