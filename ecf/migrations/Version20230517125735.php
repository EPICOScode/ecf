<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230517125735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ergonomie (id INT AUTO_INCREMENT NOT NULL, id_ergo INT NOT NULL, pmr TINYINT(1) NOT NULL, lumierjour TINYINT(1) NOT NULL, lumierearti VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logiciels (id INT AUTO_INCREMENT NOT NULL, id_logiciel VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE materiels (id INT AUTO_INCREMENT NOT NULL, id_materiel VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, salles_id INT NOT NULL, id_reservation VARCHAR(255) NOT NULL, date_heure_reservation DATE NOT NULL, salle_reserver VARCHAR(255) NOT NULL, INDEX IDX_42C84955A76ED395 (user_id), UNIQUE INDEX UNIQ_42C84955B11E4946 (salles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, id_salle VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, capacité INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_ergonomie (salle_id INT NOT NULL, ergonomie_id INT NOT NULL, INDEX IDX_C230D62FDC304035 (salle_id), INDEX IDX_C230D62FD0A4FB17 (ergonomie_id), PRIMARY KEY(salle_id, ergonomie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_logiciels (salle_id INT NOT NULL, logiciels_id INT NOT NULL, INDEX IDX_53F2C52DC304035 (salle_id), INDEX IDX_53F2C52F2611475 (logiciels_id), PRIMARY KEY(salle_id, logiciels_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle_materiels (salle_id INT NOT NULL, materiels_id INT NOT NULL, INDEX IDX_7BBAD239DC304035 (salle_id), INDEX IDX_7BBAD239A10E8B56 (materiels_id), PRIMARY KEY(salle_id, materiels_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, id_user VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955B11E4946 FOREIGN KEY (salles_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_ergonomie ADD CONSTRAINT FK_C230D62FD0A4FB17 FOREIGN KEY (ergonomie_id) REFERENCES ergonomie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_logiciels ADD CONSTRAINT FK_53F2C52DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_logiciels ADD CONSTRAINT FK_53F2C52F2611475 FOREIGN KEY (logiciels_id) REFERENCES logiciels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_materiels ADD CONSTRAINT FK_7BBAD239DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salle_materiels ADD CONSTRAINT FK_7BBAD239A10E8B56 FOREIGN KEY (materiels_id) REFERENCES materiels (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955B11E4946');
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FDC304035');
        $this->addSql('ALTER TABLE salle_ergonomie DROP FOREIGN KEY FK_C230D62FD0A4FB17');
        $this->addSql('ALTER TABLE salle_logiciels DROP FOREIGN KEY FK_53F2C52DC304035');
        $this->addSql('ALTER TABLE salle_logiciels DROP FOREIGN KEY FK_53F2C52F2611475');
        $this->addSql('ALTER TABLE salle_materiels DROP FOREIGN KEY FK_7BBAD239DC304035');
        $this->addSql('ALTER TABLE salle_materiels DROP FOREIGN KEY FK_7BBAD239A10E8B56');
        $this->addSql('DROP TABLE ergonomie');
        $this->addSql('DROP TABLE logiciels');
        $this->addSql('DROP TABLE materiels');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE salle_ergonomie');
        $this->addSql('DROP TABLE salle_logiciels');
        $this->addSql('DROP TABLE salle_materiels');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
