<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220323160702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usager_translation (id INT AUTO_INCREMENT NOT NULL, translatable_id INT DEFAULT NULL, contenu LONGTEXT DEFAULT NULL, locale VARCHAR(5) NOT NULL, INDEX IDX_7066E08F2C2AC5D3 (translatable_id), UNIQUE INDEX usager_translation_unique_translation (translatable_id, locale), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usager_translation ADD CONSTRAINT FK_7066E08F2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES usager (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE usager_translation');
    }
}
