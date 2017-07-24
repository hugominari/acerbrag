<?php



/**
 * Skeleton subclass for representing a row from the 'auditoria' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.4 on:
 *
 * Tue Sep 23 16:17:59 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Communikame
 */
class Auditoria extends BaseAuditoria {
	/**
	 * Erro severo.
	 */
	const LEVEL_ERROR			= 1;

	/**
	 * Aviso (erro não severo).
	 */
	const LEVEL_WARNING			= 2;

	/**
	 * Informação geral.
	 */
	const LEVEL_INFO			= 3;

	/**
	 * Mensagem de depuração do sistema.
	 */
	const LEVEL_DEBUG			= 4;

	/**
	 * Representa a tabela de usuários.
	 */
	const TIPO_USUARIO			= 1;

	/**
	 * Representa os registros de tipo instituicao
	 */
	const TIPO_INSTITUICAO		= 2;

	/**
	 * Representa os registros de tipo filial.
	 */
	const TIPO_FILIAL			= 3;

	/**
	 * Representa os registros de tipo podcast.
	 */
	const TIPO_PODCAST			= 4;

	/**
	 * Representa os registros de tipo podcast.
	 */
	const TIPO_MEMBRO			= 5;

	/**
	 * Representa os registros do tipo agenda.
	 */
	const TIPO_AGENDA			= 6;

	/**
	 * Representa os registros do tipo pg.
	 */
	const TIPO_PG				= 7;

	/**
	 * Representa os registros do tipo notícia.
	 */
	const TIPO_NOTICIA			= 8;

	/**
	 * Representa os registros do tipo ministério.
	 */
	const TIPO_MINISTERIO		= 9;

	/**
	 * Representa os registros do tipo vídeo.
	 */
	const TIPO_VIDEO			= 10;

	/**
	 * Grava uma mensagem de log no banco de dados.
	 * @param string $msg Mensagem que será gravada.
	 * @param int $nivel (opcional) Nível da mensagem. Pode ser uma das
	 * constantes da classe: LEVEL_ERROR, LEVEL_WARNING, LEVEL_INFO ou
	 * LEVEL_DEBUG. O padrão é LEVEL_INFO.
	 * @param Usuario $usuario (opcional) O usuário relacionada à mensagem. Se
	 * não for informado, o usuário atual será usado. Se for passado o valor
	 * false, nenhum usuário será relacionado à mensagem. O padrão é null.
	 * @param string $tipo (opcional) Tipo do registro. Deve ser uma das
	 * constantes <code>Auditoria::TIPO_*</code>. O padrão é
	 * <code>Auditoria::TIPO_SISTEMA</code>.
	 * @param string $registro (opcional) ID do registro de acordo com o tipo.
	 */
	public static function adicionar($msg, $nivel = self::LEVEL_INFO, $usuario = null, $obs = null, $tipo = self::TIPO_SISTEMA, $registro = null)
	{
		$log = new self;
		$log->setMensagem($msg);
		$log->setData(date('Y-m-d H:i:s'));
		$log->setNivel($nivel);
		$log->setUsuario(is_object($usuario) ? $usuario : ($usuario !== false ? Usuario::atual() : null));
		$log->setIp(Enviroment::isWebEnviroment() ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1');
		$log->setObservacao($obs);
		$log->setTipo($tipo);
		$log->setRegistroId($registro);
		$log->save();
	}

	/**
	 * Retorna a data formatada de acordo com o tempo de existência da
	 * mensagem (hoje, ontem, etc, da mesma forma como as notificações das
	 * principais redes sociais).
	 * @return string Data formatada.
	 */
	public function getDataFormatada()
	{
		return Utils::getDateFormatted($this->getData());
	}
} // Auditoria