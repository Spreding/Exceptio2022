<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id')->hideOnForm(),
            TextField::new('Name'),
            ImageField::new('link')
                ->onlyOnForms()
                ->setUploadDir('public/assets/uploads/')
                ->setSortable(false)
                ->setFormTypeOption('required' ,false),
            ImageField::new('link')->hideOnForm()->setBasePath('assets/uploads'),
            TextareaField::new('description'),
            AssociationField::new('imageCategories')->setFormTypeOptions([
                'by_reference' => false,
            ])->autocomplete(),
            TextField::new('size',)->hideOnForm(),
            TextField::new('size','Size : (horizontal / vertical / square)')->onlyOnForms(),

        ];
    }

}
