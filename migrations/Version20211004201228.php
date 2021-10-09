<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004201228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelicula CHANGE adultos adultos TINYINT(1) DEFAULT NULL, CHANGE tmdb_id tmdb_id INT DEFAULT NULL, CHANGE fecha_estreno fecha_estreno DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelicula CHANGE adultos adultos TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE tmdb_id tmdb_id INT DEFAULT 0 NOT NULL, CHANGE fecha_estreno fecha_estreno DATETIME DEFAULT \'1900-01-01 00:00:00\' NOT NULL');
    }
}
