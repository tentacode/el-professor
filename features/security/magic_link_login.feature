Feature: Login with a Magic Link

    Scenario: I should be able to connect with a passwordless token / uid combo
        Given I am on "/?pl_token=token-elp&pl_uid=uid-elp"
        Then I should see "Je sais pas quoi mettre alors je vais mettre un Lorem Ipsum"

    Scenario: I should not be connected by default
        Given I am on "/"
        Then I should be on "/magic-link"

    Scenario Outline: I cannot connect with invalid tokens
        Given I am on "/?pl_token=<token>&pl_uid=<uid>"
        Then I should see "Votre lien n'a pas l'air de fonctionner"

        Examples:
            | uid      | token      |
            |          |            |
            | non      | non        |
            | uid-1234 | non        |
            | non      | token-1234 |