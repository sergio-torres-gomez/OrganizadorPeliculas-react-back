<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004200452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelicula CHANGE descripcion descripcion LONGTEXT DEFAULT NULL, CHANGE ano ano INT DEFAULT NULL, CHANGE idioma_original idioma_original VARCHAR(255) DEFAULT NULL, CHANGE titulo_original titulo_original VARCHAR(255) DEFAULT NULL, CHANGE fecha_estreno fecha_estreno DATETIME DEFAULT \'1900-01-01\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelicula CHANGE descripcion descripcion LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ano ano INT DEFAULT 1000 NOT NULL, CHANGE idioma_original idioma_original VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titulo_original titulo_original VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE fecha_estreno fecha_estreno DATETIME DEFAULT \'1900-01-01 00:00:00\' NOT NULL');
    }
}
