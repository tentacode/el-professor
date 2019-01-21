Feature: Logbook supervision

    Scenario: I can supervise logbooks
        Given I am logged in with elp
        And I am on "/supervision/journal-de-bord"
        Then I should see "Ber Lin"
        And I should see "7 entrées"
        When I follow "Ber Lin"
        Then I should see "Journal de bord - Ber Lin"
