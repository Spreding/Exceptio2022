<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531163129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD sorting_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image CHANGE public_name title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE phrase_accueil ADD auteur VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP sorting_name');
        $this->addSql('ALTER TABLE image CHANGE title public_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE phrase_accueil DROP auteur');
    }
}
