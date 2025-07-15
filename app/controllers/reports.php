<?php

class Reports extends Controller {
    public function index() {
        session_start();

        if (!isset($_SESSION['auth']) || !$_SESSION['is_admin']) {
            header('Location: /login');
            exit;
        }

        $noteModel = $this->model('Note');
        $userModel = $this->model('User');

        $notes = $noteModel->getAllNotesWithUser();
        $mostNotesUser = $noteModel->getUserWithMostNotes();
        $loginCounts = $userModel->getLoginCounts();

        $this->view('reports/index', [
            'notes' => $notes,
            'mostNotesUser' => $mostNotesUser,
            'logins' => $loginCounts
        ]);
    }
}
