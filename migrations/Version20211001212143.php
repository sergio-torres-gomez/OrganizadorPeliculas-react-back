<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211001212143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE actor (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, foto VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE director (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genero (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pelicula (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion LONGTEXT NOT NULL, ano INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pelicula_genero (pelicula_id INT NOT NULL, genero_id INT NOT NULL, INDEX IDX_435CD18470713909 (pelicula_id), INDEX IDX_435CD184BCE7B795 (genero_id), PRIMARY KEY(pelicula_id, genero_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pelicula_director (pelicula_id INT NOT NULL, director_id INT NOT NULL, INDEX IDX_76615ACA70713909 (pelicula_id), INDEX IDX_76615ACA899FB366 (director_id), PRIMARY KEY(pelicula_id, director_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pelicula_actor (pelicula_id INT NOT NULL, actor_id INT NOT NULL, INDEX IDX_7B27FA7170713909 (pelicula_id), INDEX IDX_7B27FA7110DAF24A (actor_id), PRIMARY KEY(pelicula_id, actor_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peliculas_usuarios (id INT AUTO_INCREMENT NOT NULL, pelicula_id INT DEFAULT NULL, usuario_id INT DEFAULT NULL, orden INT NOT NULL, INDEX IDX_B33309F770713909 (pelicula_id), INDEX IDX_B33309F7DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pelicula_genero ADD CONSTRAINT FK_435CD18470713909 FOREIGN KEY (pelicula_id) REFERENCES pelicula (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pelicula_genero ADD CONSTRAINT FK_435CD184BCE7B795 FOREIGN KEY (genero_id) REFERENCES genero (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pelicula_director ADD CONSTRAINT FK_76615ACA70713909 FOREIGN KEY (pelicula_id) REFERENCES pelicula (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pelicula_director ADD CONSTRAINT FK_76615ACA899FB366 FOREIGN KEY (director_id) REFERENCES director (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pelicula_actor ADD CONSTRAINT FK_7B27FA7170713909 FOREIGN KEY (pelicula_id) REFERENCES pelicula (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pelicula_actor ADD CONSTRAINT FK_7B27FA7110DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE peliculas_usuarios ADD CONSTRAINT FK_B33309F770713909 FOREIGN KEY (pelicula_id) REFERENCES pelicula (id)');
        $this->addSql('ALTER TABLE peliculas_usuarios ADD CONSTRAINT FK_B33309F7DB38439E FOREIGN KEY (usuario_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pelicula_actor DROP FOREIGN KEY FK_7B27FA7110DAF24A');
        $this->addSql('ALTER TABLE pelicula_director DROP FOREIGN KEY FK_76615ACA899FB366');
        $this->addSql('ALTER TABLE pelicula_genero DROP FOREIGN KEY FK_435CD184BCE7B795');
        $this->addSql('ALTER TABLE pelicula_genero DROP FOREIGN KEY FK_435CD18470713909');
        $this->addSql('ALTER TABLE pelicula_director DROP FOREIGN KEY FK_76615ACA70713909');
        $this->addSql('ALTER TABLE pelicula_actor DROP FOREIGN KEY FK_7B27FA7170713909');
        $this->addSql('ALTER TABLE peliculas_usuarios DROP FOREIGN KEY FK_B33309F770713909');
        $this->addSql('ALTER TABLE peliculas_usuarios DROP FOREIGN KEY FK_B33309F7DB38439E');
        $this->addSql('DROP TABLE actor');
        $this->addSql('DROP TABLE director');
        $this->addSql('DROP TABLE genero');
        $this->addSql('DROP TABLE pelicula');
        $this->addSql('DROP TABLE pelicula_genero');
        $this->addSql('DROP TABLE pelicula_director');
        $this->addSql('DROP TABLE pelicula_actor');
        $this->addSql('DROP TABLE peliculas_usuarios');
        $this->addSql('DROP TABLE user');
    }
}
