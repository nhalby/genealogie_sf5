<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307100708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usager (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, prenom2 VARCHAR(255) DEFAULT NULL, prenom3 VARCHAR(255) DEFAULT NULL, prenom4 VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, surnom VARCHAR(255) NOT NULL, date_naissance DATETIME DEFAULT NULL, parent1_id INT DEFAULT NULL, parent2_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE usager');
    }
}
