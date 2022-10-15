<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221015095547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_type (movie_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_7FB876248F93B6FC (movie_id), INDEX IDX_7FB87624C54C8C93 (type_id), PRIMARY KEY(movie_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE people_role_in_movie (id INT AUTO_INCREMENT NOT NULL, movie_id INT NOT NULL, people_id INT NOT NULL, role VARCHAR(255) NOT NULL, significance VARCHAR(255) DEFAULT NULL, INDEX UNIQ_C58E3968F93B6FC (movie_id), INDEX UNIQ_C58E3963147C936 (people_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE movie_type ADD CONSTRAINT FK_7FB876248F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie_type ADD CONSTRAINT FK_7FB87624C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE people_role_in_movie ADD CONSTRAINT FK_C58E3968F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE people_role_in_movie ADD CONSTRAINT FK_C58E3963147C936 FOREIGN KEY (people_id) REFERENCES people (id)');
        $this->addSql('ALTER TABLE movie_has_people DROP FOREIGN KEY fk_Movie_has_People_Movie1');
        $this->addSql('ALTER TABLE movie_has_people DROP FOREIGN KEY fk_Movie_has_People_People1');
        $this->addSql('ALTER TABLE movie_has_type DROP FOREIGN KEY fk_Movie_has_Type_Movie1');
        $this->addSql('ALTER TABLE movie_has_type DROP FOREIGN KEY fk_Movie_has_Type_Type1');
        $this->addSql('DROP TABLE movie_has_people');
        $this->addSql('DROP TABLE movie_has_type');
        $this->addSql('ALTER TABLE people CHANGE date_of_birth birthdate DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE movie_has_people (Movie_id INT NOT NULL, People_id INT NOT NULL, role VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, significance VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX fk_Movie_has_People_People1 (People_id), INDEX IDX_EDC40D8176E5D4AA (Movie_id), PRIMARY KEY(Movie_id, People_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE movie_has_type (Movie_id INT NOT NULL, Type_id INT NOT NULL, INDEX fk_Movie_has_Type_Type1 (Type_id), INDEX IDX_D7417FB76E5D4AA (Movie_id), PRIMARY KEY(Movie_id, Type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE movie_has_people ADD CONSTRAINT fk_Movie_has_People_Movie1 FOREIGN KEY (Movie_id) REFERENCES movie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE movie_has_people ADD CONSTRAINT fk_Movie_has_People_People1 FOREIGN KEY (People_id) REFERENCES people (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE movie_has_type ADD CONSTRAINT fk_Movie_has_Type_Movie1 FOREIGN KEY (Movie_id) REFERENCES movie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE movie_has_type ADD CONSTRAINT fk_Movie_has_Type_Type1 FOREIGN KEY (Type_id) REFERENCES type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE movie_type DROP FOREIGN KEY FK_7FB876248F93B6FC');
        $this->addSql('ALTER TABLE movie_type DROP FOREIGN KEY FK_7FB87624C54C8C93');
        $this->addSql('ALTER TABLE people_role_in_movie DROP FOREIGN KEY FK_C58E3968F93B6FC');
        $this->addSql('ALTER TABLE people_role_in_movie DROP FOREIGN KEY FK_C58E3963147C936');
        $this->addSql('DROP TABLE movie_type');
        $this->addSql('DROP TABLE people_role_in_movie');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE people CHANGE birthdate date_of_birth DATE NOT NULL');
    }
}
