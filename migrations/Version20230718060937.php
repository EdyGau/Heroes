<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230718060937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, episode INT NOT NULL, opening_crawl LONGTEXT NOT NULL, director VARCHAR(255) NOT NULL, producer VARCHAR(255) NOT NULL, release_date DATE NOT NULL, created DATE NOT NULL, edited DATE NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people (id INT AUTO_INCREMENT NOT NULL, homeworld_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, height INT NOT NULL, mass INT NOT NULL, hair VARCHAR(255) NOT NULL, skin VARCHAR(255) NOT NULL, eye VARCHAR(255) NOT NULL, birthday_year VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_28166A26484D1B39 (homeworld_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_species (people_id INT NOT NULL, species_id INT NOT NULL, INDEX IDX_E5A6EB563147C936 (people_id), INDEX IDX_E5A6EB56B2A1D860 (species_id), PRIMARY KEY(people_id, species_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_vehicle (people_id INT NOT NULL, vehicle_id INT NOT NULL, INDEX IDX_5B29F8C23147C936 (people_id), INDEX IDX_5B29F8C2545317D1 (vehicle_id), PRIMARY KEY(people_id, vehicle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_film (people_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_808D72923147C936 (people_id), INDEX IDX_808D7292567F5183 (film_id), PRIMARY KEY(people_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_starship (people_id INT NOT NULL, starship_id INT NOT NULL, INDEX IDX_B5E5CADF3147C936 (people_id), INDEX IDX_B5E5CADF9B24DF5 (starship_id), PRIMARY KEY(people_id, starship_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rotation_period VARCHAR(255) NOT NULL, orbital_period VARCHAR(255) NOT NULL, diameter VARCHAR(255) NOT NULL, climate VARCHAR(255) NOT NULL, gravity VARCHAR(255) NOT NULL, terrain VARCHAR(255) NOT NULL, surface_water VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, created DATETIME NOT NULL, edited DATETIME NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, classification VARCHAR(255) NOT NULL, designation VARCHAR(255) NOT NULL, average_height VARCHAR(255) NOT NULL, skin_colors VARCHAR(255) NOT NULL, hair_colors VARCHAR(255) NOT NULL, eye_colors VARCHAR(255) NOT NULL, average_lifespan VARCHAR(255) NOT NULL, homeworld VARCHAR(255) DEFAULT \'\' NOT NULL, language VARCHAR(255) NOT NULL, created DATETIME NOT NULL, edited DATETIME NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starship (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, manufacturer VARCHAR(255) NOT NULL, cost_in_credits VARCHAR(255) NOT NULL, length VARCHAR(255) NOT NULL, max_atmosphering_speed VARCHAR(255) NOT NULL, crew VARCHAR(255) NOT NULL, passengers VARCHAR(255) NOT NULL, cargo_capacity VARCHAR(255) NOT NULL, consumables VARCHAR(255) NOT NULL, hyperdrive_rating VARCHAR(255) NOT NULL, mglt VARCHAR(255) NOT NULL, starship_class VARCHAR(255) NOT NULL, created DATETIME NOT NULL, edited DATETIME NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, manufacturer VARCHAR(255) NOT NULL, cost_in_credits VARCHAR(255) NOT NULL, length VARCHAR(255) NOT NULL, max_atmosphering_speed VARCHAR(255) NOT NULL, crew VARCHAR(255) NOT NULL, passengers VARCHAR(255) NOT NULL, cargo_capacity VARCHAR(255) NOT NULL, consumables VARCHAR(255) NOT NULL, vehicle_class VARCHAR(255) NOT NULL, created DATETIME NOT NULL, edited DATETIME NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE people ADD CONSTRAINT FK_28166A26484D1B39 FOREIGN KEY (homeworld_id) REFERENCES planet (id)');
        $this->addSql('ALTER TABLE people_species ADD CONSTRAINT FK_E5A6EB563147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_species ADD CONSTRAINT FK_E5A6EB56B2A1D860 FOREIGN KEY (species_id) REFERENCES species (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_vehicle ADD CONSTRAINT FK_5B29F8C23147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_vehicle ADD CONSTRAINT FK_5B29F8C2545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_film ADD CONSTRAINT FK_808D72923147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_film ADD CONSTRAINT FK_808D7292567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_starship ADD CONSTRAINT FK_B5E5CADF3147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_starship ADD CONSTRAINT FK_B5E5CADF9B24DF5 FOREIGN KEY (starship_id) REFERENCES starship (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE people DROP FOREIGN KEY FK_28166A26484D1B39');
        $this->addSql('ALTER TABLE people_species DROP FOREIGN KEY FK_E5A6EB563147C936');
        $this->addSql('ALTER TABLE people_species DROP FOREIGN KEY FK_E5A6EB56B2A1D860');
        $this->addSql('ALTER TABLE people_vehicle DROP FOREIGN KEY FK_5B29F8C23147C936');
        $this->addSql('ALTER TABLE people_vehicle DROP FOREIGN KEY FK_5B29F8C2545317D1');
        $this->addSql('ALTER TABLE people_film DROP FOREIGN KEY FK_808D72923147C936');
        $this->addSql('ALTER TABLE people_film DROP FOREIGN KEY FK_808D7292567F5183');
        $this->addSql('ALTER TABLE people_starship DROP FOREIGN KEY FK_B5E5CADF3147C936');
        $this->addSql('ALTER TABLE people_starship DROP FOREIGN KEY FK_B5E5CADF9B24DF5');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE people');
        $this->addSql('DROP TABLE people_species');
        $this->addSql('DROP TABLE people_vehicle');
        $this->addSql('DROP TABLE people_film');
        $this->addSql('DROP TABLE people_starship');
        $this->addSql('DROP TABLE planet');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE starship');
        $this->addSql('DROP TABLE vehicle');
    }
}
