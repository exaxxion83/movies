<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221015144241 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_people_role_in_movie (movie_id INT NOT NULL, people_role_in_movie_id INT NOT NULL, INDEX IDX_E767B57B8F93B6FC (movie_id), INDEX IDX_E767B57B8F3C7897 (people_role_in_movie_id), PRIMARY KEY(movie_id, people_role_in_movie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_role_in_movie_people (people_role_in_movie_id INT NOT NULL, people_id INT NOT NULL, INDEX IDX_8F589C3D8F3C7897 (people_role_in_movie_id), INDEX IDX_8F589C3D3147C936 (people_id), PRIMARY KEY(people_role_in_movie_id, people_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_people_role_in_movie ADD CONSTRAINT FK_E767B57B8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_people_role_in_movie ADD CONSTRAINT FK_E767B57B8F3C7897 FOREIGN KEY (people_role_in_movie_id) REFERENCES people_role_in_movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_role_in_movie_people ADD CONSTRAINT FK_8F589C3D8F3C7897 FOREIGN KEY (people_role_in_movie_id) REFERENCES people_role_in_movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_role_in_movie_people ADD CONSTRAINT FK_8F589C3D3147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_role_in_movie DROP FOREIGN KEY FK_C58E3963147C936');
        $this->addSql('ALTER TABLE people_role_in_movie DROP FOREIGN KEY FK_C58E3968F93B6FC');
        $this->addSql('DROP INDEX UNIQ_C58E3968F93B6FC ON people_role_in_movie');
        $this->addSql('DROP INDEX UNIQ_C58E3963147C936 ON people_role_in_movie');
        $this->addSql('ALTER TABLE people_role_in_movie DROP movie_id, DROP people_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie_people_role_in_movie DROP FOREIGN KEY FK_E767B57B8F93B6FC');
        $this->addSql('ALTER TABLE movie_people_role_in_movie DROP FOREIGN KEY FK_E767B57B8F3C7897');
        $this->addSql('ALTER TABLE people_role_in_movie_people DROP FOREIGN KEY FK_8F589C3D8F3C7897');
        $this->addSql('ALTER TABLE people_role_in_movie_people DROP FOREIGN KEY FK_8F589C3D3147C936');
        $this->addSql('DROP TABLE movie_people_role_in_movie');
        $this->addSql('DROP TABLE people_role_in_movie_people');
        $this->addSql('ALTER TABLE people_role_in_movie ADD movie_id INT NOT NULL, ADD people_id INT NOT NULL');
        $this->addSql('ALTER TABLE people_role_in_movie ADD CONSTRAINT FK_C58E3963147C936 FOREIGN KEY (people_id) REFERENCES people (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE people_role_in_movie ADD CONSTRAINT FK_C58E3968F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX UNIQ_C58E3968F93B6FC ON people_role_in_movie (movie_id)');
        $this->addSql('CREATE INDEX UNIQ_C58E3963147C936 ON people_role_in_movie (people_id)');
    }
}
