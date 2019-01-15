Feature: Login with a Magic Link

    Scenario: I should be able to connect with a passwordless token / uid combo
        Given I am on "/?pl_token=token-1234&pl_uid=uid-1234"
        Then I should see "Je sais pas quoi mettre alors je vais mettre un Lorem Ipsum"

    Scenario: I should not be connected by default
        Given I am on "/"
        Then I should be on "/magic-link"
