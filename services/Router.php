<?php
class Router {

    private const DEFAULT_ROUTE = 'home';
    public function handle(array $get): void {
        $page = new PageController();

        $route = strtolower(trim($get["route"] ?? self::DEFAULT_ROUTE, '/'));

        if ($route === 'login') {
            $page->showLogin();

        } else if ($route === 'login_submit') {
            $page->login(); // POST request to process the login

        } else if ($route === 'register') {
            $page->showRegister();

        } else if ($route === 'register_submit') {
            $page->register();

        } else if ($route === 'logout') {
            $page->logout();

        } else if ($route === self::DEFAULT_ROUTE || $route === 'home') {
            $page->home(); // The main dashboard view

        } else if ($route === 'payment_add') {
            $page->showAddPaymentForm();

        } else if ($route === 'payment_submit') {
            $page->addPayment(); // POST request to process the expense

        } else if ($route === 'resolve_add') {
            $page->showResolvePaymentForm();

        } else if ($route === 'resolve_submit') {
            $page->resolvePayment(); // POST request to process the refund

        } else if ($route === 'refund_history') {
            $page->refundHistory();

        } else {
            // 3. Fallback for 404 Not Found
            header("HTTP/1.0 404 Not Found");
            echo "404 Page Not Found";
        }
    }
}
