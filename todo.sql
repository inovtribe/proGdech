ALTER TABLE t_fondscarte ALTER attribution_fondcarte SET NOT NULL;
ALTER TABLE t_fondscarte ALTER id_typefondcarte DROP NOT NULL;
ALTER TABLE t_fondscarte ADD CONSTRAINT FK_A324C2B4A9B69F7A FOREIGN KEY (id_typefondcarte) REFERENCES t_typesfondscartes (id_typefondcarte) ON DELETE RESTRICT NOT DEFERRABLE INITIALLY IMMEDIATE;
CREATE INDEX IDX_A324C2B4A9B69F7A ON t_fondscarte (id_typefondcarte);
ALTER TABLE t_typesfondscartes ALTER id_typefondcarte DROP DEFAULT;
ALTER TABLE t_ptscollecte DROP CONSTRAINT fk_t_ptscollecte_id_photo;
DROP INDEX IDX_C3F488B8FA32C528;
ALTER TABLE t_ptscollecte DROP id_photo;
