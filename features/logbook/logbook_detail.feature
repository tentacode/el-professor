Feature: Logbook detail

    Scenario: I can't access logbook if I'm not logged in
        Given I am on "/jdb"
        Then I should be on "/magic-link"

    Scenario: I can't access logbook if I'm not logged in
        Given I am logged in with berlin
        And I am on "/jdb"
        Then I should see "Voici votre journal de bord"
        And I should see "Aujourd'hui j'ai enfin réussi à connecter ma plante !"