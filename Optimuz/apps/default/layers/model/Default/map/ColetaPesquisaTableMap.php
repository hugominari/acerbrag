<?php



/**
 * This class defines the structure of the 'coleta_pesquisa' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Default.map
 */
class ColetaPesquisaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ColetaPesquisaTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('coleta_pesquisa');
		$this->setPhpName('ColetaPesquisa');
		$this->setClassname('ColetaPesquisa');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('PESQUISA_ID', 'PesquisaId', 'INTEGER', 'pesquisa', 'ID', true, 10, null);
		$this->addColumn('DATA_CRIACAO', 'DataCriacao', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Pesquisa', 'Pesquisa', RelationMap::MANY_TO_ONE, array('pesquisa_id' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('Resposta', 'Resposta', RelationMap::ONE_TO_MANY, array('id' => 'coleta_pesquisa_id', ), null, null, 'Respostas');
	} // buildRelations()

} // ColetaPesquisaTableMap
