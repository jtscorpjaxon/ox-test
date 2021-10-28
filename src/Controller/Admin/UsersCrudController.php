<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            TextField::new('login'),
            TextField::new('email')->setFormType(EmailType::class),
            TextField::new('password')->setFormType(PasswordType::class),
            TextField::new('role')->setFormType(ChoiceType::class)
                ->setFormTypeOption('choices', [
                    'Admin' => 'admin',
                    'Read Product' => 'owner',
                    'User' => 'user',
                ]
                )

        ];
    }

}
