<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Shop Product')
            ->setEntityLabelInPlural('Shop Products');
    }
    
    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        yield TextField::new('name');
        yield TextareaField::new('description')
            ->onlyOnForms();
        yield NumberField::new('price')
            ->setNumDecimals(2);
        $createdAt = DateTimeField::new('createdAt')
            ->setFormat('short', 'medium');
                if (Crud::PAGE_EDIT === $pageName) {
                    yield $createdAt
                        ->setFormTypeOption('disabled', true);
                } else {
                    yield $createdAt;
                }
        yield DateTimeField::new('updatedAt')
            ->hideONForm()
            ->setFormat('short', 'medium');   
    }
}
