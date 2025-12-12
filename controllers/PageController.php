<?php
class PageController extends AbstractController {

    public function logout() {
        // Destroys the session and redirects
        session_destroy();
        header('Location: index.php?route=login');
    }

    public function home() {
        $spendingManager = new SpendingManager();
        $userId = $_SESSION['user_id'];

        $spendings = $spendingManager->findSpendingForUser($userId);
        $viewData = [
            'pageTitle' => 'Dashboard | Tricount',
            'currentUsername' => $_SESSION['username'],
            'spendings' => $spendings,
        ];

        $this->renderView('templates/homepage', $viewData);
    }
    public function showAddPaymentForm() {
        $this->renderView("templates/addPayment.phtml", []);
    }

// (New method)
    public function addPayment() {
        $spendingManager = new SpendingManager();
        $paidBy = $_SESSION['user_id'];
        $ammount = $_POST['ammount'];
        $category = $_POST['category'];

        $spendingManager->insertSpending($paidBy, $ammount, $category);
        header('Location: index.php?route=home');

    }

    public function showResolvePaymentForm() {
        $UserManager = new UserManager();

        $users = $UserManager->findAll();

        // 3. RENDER THE VIEW
        $this->renderView('refund/resolve_payment', ['pageTitle' => 'Enregistrer un Règlement', 'users' => $users]);
    }

// (New method)
    public function resolvePayment() {
        // Processes the POST submission from the resolve settlement form
    }

// (New method)
    public function refundHistory() {
        // Loads the view showing all past refunds/settlements
    }
}
