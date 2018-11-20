<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181114205142 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE evaluation (id INT AUTO_INCREMENT NOT NULL, module_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_1323A575AFC2B591 (module_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, evaluation_id INT NOT NULL, title VARCHAR(255) NOT NULL, details LONGTEXT DEFAULT NULL, points NUMERIC(5, 2) NOT NULL, INDEX IDX_B6F7494E456C5646 (evaluation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, INDEX IDX_329937511E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, module_id INT NOT NULL, user_id INT NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', INDEX IDX_AB55E24FAFC2B591 (module_id), INDEX IDX_AB55E24FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evaluation ADD CONSTRAINT FK_1323A575AFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E456C5646 FOREIGN KEY (evaluation_id) REFERENCES evaluation (id)');
        $this->addSql('ALTER TABLE score ADD CONSTRAINT FK_329937511E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FAFC2B591 FOREIGN KEY (module_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E456C5646');
        $this->addSql('ALTER TABLE score DROP FOREIGN KEY FK_329937511E27F6BF');
        $this->addSql('ALTER TABLE evaluation DROP FOREIGN KEY FK_1323A575AFC2B591');
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FAFC2B591');
        $this->addSql('DROP TABLE evaluation');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE score');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE participation');
    }
}
