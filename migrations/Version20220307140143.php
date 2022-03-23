<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220307140143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usager ADD valide TINYINT(1) NOT NULL, CHANGE prenom4 prenom4 VARCHAR(255) DEFAULT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE date_naissance date_naissance DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usager DROP valide, CHANGE prenom4 prenom4 VARCHAR(255) NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE date_naissance date_naissance DATETIME DEFAULT NULL');
    }
}
