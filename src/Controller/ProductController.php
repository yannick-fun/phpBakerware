<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ProductService;

class ProductController extends AbstractController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    #[Route('/', name: 'app_product')]
    public function index(): Response
    {
        $products = $this->productService->getProducts();
        $highestPriceProduct = $this->productService->getHighestPriceProduct();

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'highestPriceProduct' => $highestPriceProduct,
        ]);
    }
}
