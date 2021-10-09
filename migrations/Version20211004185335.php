<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211004185335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelicula ADD adultos TINYINT(1) DEFAULT \'0\' NOT NULL, ADD tmdb_id INT DEFAULT 0 NOT NULL, ADD idioma_original VARCHAR(255) DEFAULT \'\' NOT NULL, ADD titulo_original VARCHAR(255) DEFAULT \'\' NOT NULL, ADD fecha_estreno DATETIME DEFAULT \'1900-01-01\' NOT NULL, CHANGE ano ano INT DEFAULT 1000 NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelicula DROP adultos, DROP tmdb_id, DROP idioma_original, DROP titulo_original, DROP fecha_estreno, CHANGE ano ano INT NOT NULL');
    }
}
