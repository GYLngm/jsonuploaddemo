<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180801080017 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE json CHANGE date date VARCHAR(255) NOT NULL, CHANGE time time VARCHAR(255) NOT NULL, CHANGE IMEI imei INT NOT NULL, CHANGE version version INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE json CHANGE date date VARCHAR(55) NOT NULL COLLATE latin1_swedish_ci, CHANGE time time VARCHAR(55) NOT NULL COLLATE latin1_swedish_ci, CHANGE imei IMEI VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, CHANGE version version VARCHAR(30) NOT NULL COLLATE latin1_swedish_ci');
    }
}
