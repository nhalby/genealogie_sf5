<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220321132118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usager ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD created_by INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD updated_by INT DEFAULT NULL, ADD deleted_at DATETIME DEFAULT NULL, ADD deleted_by INT DEFAULT NULL, ADD is_draft TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ADD created_by INT DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD updated_by INT DEFAULT NULL, ADD deleted_at DATETIME DEFAULT NULL, ADD deleted_by INT DEFAULT NULL, ADD is_draft TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usager DROP created_at, DROP created_by, DROP updated_at, DROP updated_by, DROP deleted_at, DROP deleted_by, DROP is_draft');
        $this->addSql('ALTER TABLE `user` DROP created_at, DROP created_by, DROP updated_at, DROP updated_by, DROP deleted_at, DROP deleted_by, DROP is_draft');
    }
}