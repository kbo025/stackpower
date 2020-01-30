<?php

namespace Models;

use \Core\Model;

class Consulta extends Model
{

    public function getList()
    {
        $data = array();
        $sql = $this->db->query("SELECT TIMEDIFF(a.dtfinal, a.dtinicial) as diferenca , a.id, a.nome, a.situacao, a.rg, a.cpf, c.base, a.nascimento, a.status, a.dtinicial, a.dtfinal, b.name FROM sarque a LEFT JOIN users b ON a.id_usuario = b.id LEFT JOIN base c ON a.base = c.id where a.dtinicial BETWEEN CONCAT(CURDATE(), ' 07:00:00') AND CONCAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), ' 07:00:00') and a.status IN(5,3,6,7)");

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }

    public function add($nome, $rg, $cpf, $datanasc, $base, $nomemae)
    {
        $sql = $this->db->prepare("INSERT INTO sarque SET nome = :nome, rg = :rg, data_cadastro = now(), 
		cpf = :cpf, nascimento = :datanascm, base = :base, status = 'PENDENTE', mae = :mae, 
		prisao = 'NADA CONSTA', passagem = 'NADA CONSTA' ");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":mae", $nomemae);
        $sql->bindValue(":rg", $rg);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":datanascm", $datanasc);
        $sql->bindValue(":base", $base);
        $sql->execute();
    }

    public function getInfo($id)
    {
        $data = array();

        $sql = $this->db->prepare("SELECT a.id, a.nome, a.rg, a.cpf, a.base, a.nascimento, a.prisao, a.passagem, a.status, b.name FROM sarque a  LEFT JOIN users b ON a.id_usuario = b.id WHERE a.id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetch();
        }

        return $data;
    }

    public function getPesquisador()
    {
        $data = array();

        $sql = $this->db->prepare("SELECT * FROM users WHERE tipo_usuario = 2");
        $sql->execute();

        if (!empty($sql)) {
            $data = $sql->fetchAll();
        }

        return $data;
    }
	public function GetData() {
    // Array of database columns which should be read and sent back to DataTables. Use a space where
    // you want to insert a non-database field (for example a counter or static image)
    $aColumns = array( 'ID', 'base');
    // Indexed column (used for fast and accurate table cardinality)
    $sIndexColumn = $aColumns[0];
    // DB table to use
    $sTable = "sarque";
     
    // Paging
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' ) {
        $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
    }
     
    // Ordering
    $sOrder = "";
    if ( isset( $_GET['iSortCol_0'] ) ) {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= "`".$aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."` ".
                    ($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
            }
        }
      
        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }
     
    // Filtering
    $sWhere = "";
    if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
            $sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string( $_GET['sSearch'] )."%' OR ";
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ')';
    }
     
    // Individual column filtering
    for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" ) {
                $sWhere = "WHERE ";
            } else {
                $sWhere .= " AND ";
            }
            $sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_GET['sSearch_'.$i])."%' ";
        }
    }
      
    // SQL queries
    $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS `".str_replace(" , ", " ", implode("`, `", $aColumns))."`
        FROM $sTable
        $sWhere
        $sOrder
        $sLimit";
    $rResult = $this->db->query($sQuery);
      
    // Data set length after filtering
    $sQuery = "SELECT FOUND_ROWS()";
    $rResultFilterTotal = $this->db->query($sQuery);
    $aResultFilterTotal = $rResultFilterTotal->result_array();
    $tempFilteredTotal = array_values($aResultFilterTotal[0]);
    $iFilteredTotal = $tempFilteredTotal[0];
      
    // Total data set length
    $sQuery = "SELECT COUNT(`".$sIndexColumn."`) FROM $sTable";
    $rResultTotal = $this->db->query($sQuery);
    $aResultTotal = $rResultTotal->result_array();
    $tempTotal = array_values($aResultTotal[0]);
    $iTotal = $tempTotal[0];
 
    // JSON-ify Output
    $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
    );
    foreach ($rResult->result_array() as $aRow) {
        $row = array();
        for ($i=0; $i<count($aColumns); $i++) {
            $dbID = $aRow[$aColumns[0]];
            if ($aColumns[$i] == "DBcol1") {
                $row[] = $aRow[$aColumns[$i]] != '' ? $aRow[$aColumns[$i]] : "N/A";
            } else if ($aColumns[$i] == "DBcol4") {
                $row[] = "<textarea id='notes" . $dbID . "' cols='40' rows='4' name='myname' wrap='virtual'>" . $aRow[$aColumns[$i]] . "</textarea>";
            } else if ($aColumns[$i] != ' ') {
                // General output
                $row[] = $aRow[$aColumns[$i]];
                 
            }
            // Formatted output
        }
        $row[] = "<button style='width:110px' onClick='saveChangesAction(\"" . $dbID . "\")' type='button' class='btn' aria-haspopup='true' aria-expanded='false'>Save Changes</button>";
        $row[] = "<div class='alert' role='alert' id='saveChangesResultDiv" . $dbID . "'  style='width:380px'></div>";
        $output['aaData'][] = $row;
    }
    return $output;
}
	


}