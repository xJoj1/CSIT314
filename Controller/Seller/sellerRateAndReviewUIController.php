<?php
require_once '../../Entity/UserProfile.php';

class SellerRateAndReviewUIController {
    private $userProfile;

    public function __construct() {
        $this->userProfile = new UserProfile();
    }

    // Method to get all agents
    public function getAgents() {
        return $this->userProfile->getAllAgents();
    }

    // Optionally, method to get a specific agent by ID
    public function getAgentById($agentId) {
        return $this->userProfile->getAgentById($agentId);
    }
}
?>