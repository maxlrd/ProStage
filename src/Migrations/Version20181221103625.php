<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181221103625 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE stages (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT NOT NULL, titre VARCHAR(100) NOT NULL, description VARCHAR(500) NOT NULL, email VARCHAR(50) NOT NULL, INDEX IDX_2FA26A64A4AEAFEA (entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stages_formation (stages_id INT NOT NULL, formation_id INT NOT NULL, INDEX IDX_CD0086168E55E70A (stages_id), INDEX IDX_CD0086165200282E (formation_id), PRIMARY KEY(stages_id, formation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stages ADD CONSTRAINT FK_2FA26A64A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE stages_formation ADD CONSTRAINT FK_CD0086168E55E70A FOREIGN KEY (stages_id) REFERENCES stages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stages_formation ADD CONSTRAINT FK_CD0086165200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stages_formation DROP FOREIGN KEY FK_CD0086168E55E70A');
        $this->addSql('DROP TABLE stages');
        $this->addSql('DROP TABLE stages_formation');
    }
}
