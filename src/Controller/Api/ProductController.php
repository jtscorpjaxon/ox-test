<?php
/**
 * Author Maxamadjonov Jaxongir.
 * https://github.com/jtscorpjaxon
 * Date: 27.10.2021
 * Time: 15:38
 */

namespace App\Controller\Api;

use App\Controller\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;


class ProductController extends ApiController
{
  /*  private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
    /**
     * @return JsonResponse
     * @Route("/products", name="products", methods={"GET"})
     */
   /* public function getProducts(): JsonResponse
    {

        $products = Product::all();
        return $this->response($products);
    }
    /**
     * @param $id
     * @return JsonResponse
     * @Route("/products/{id}", name="products_get", methods={"GET"})
     */
   /* public function getProduct(ProductRepository $productRepository,$id)
    {
        $product = $productRepository->find($id);

        if (!$product){
            $data = [
                'status' => 404,
                'errors' => "Product not found",
            ];
            return $this->response($data, 404);
        }
        return $this->response($product);
    }
    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param ProductRepository $productRepository
     * @param $id
     * @return JsonResponse
     * @Route("/products/{id}", name="products_put", methods={"PUT"})
     */
  /*  public function updateProduct(Request $request, EntityManagerInterface $entityManager, ProductRepository $productRepository, $id){

        try{
            $product = $productRepository->find($id);

            if (!$product){
                $data = [
                    'status' => 404,
                    'errors' => "Product not found",
                ];
                return $this->response($data, 404);
            }

            $request = $this->transformJsonBody($request);

            if (!$request || !$request->get('name') || !$request->request->get('description')){
                throw new \Exception();
            }

            $product->setName($request->get('name'));
            $product->setDescription($request->get('description'));
            $entityManager->flush();

            $data = [
                'status' => 200,
                'errors' => "Product updated successfully",
            ];
            return $this->response($data);

        }catch (\Exception $e){
            $data = [
                'status' => 422,
                'errors' => "Data no valid",
            ];
            return $this->response($data, 422);
        }

    }


    /**
     * @param ProductRepository $productRepository
     * @param $id
     * @return JsonResponse
     * @Route("/products/{id}", name="products_delete", methods={"DELETE"})
     */
  /*  public function deleteProduct(EntityManagerInterface $entityManager, ProductRepository $productRepository, $id){
        $product = $productRepository->find($id);

        if (!$product){
            $data = [
                'status' => 404,
                'errors' => "Product not found",
            ];
            return $this->response($data, 404);
        }

        $entityManager->remove($product);
        $entityManager->flush();
        $data = [
            'status' => 200,
            'errors' => "Product deleted successfully",
        ];
        return $this->response($data);
    }*/
}