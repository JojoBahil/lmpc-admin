<?php

include('dbconnect.php');
require '../PhpSpreadsheet-master/vendor/autoload.php';

//header("Content-Type:text/html; charset=ISO-8859-1");

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

date_default_timezone_set('Asia/Manila');

$CURRENT_ACADEMIC_YEAR = '2020-2021'; 
$student_portal = 'tes.lbp.app';

//FILE NAMING VARIABLES
$filetype = 'APP';
$product = 'PR';
$bankcode = '019372';
$currentdate = date('dmy');
$currenttime = date('His');
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

//EXPORT APPLICATION EXCEL FILE

if(isset($_POST['btn_generate'])){
//set default font
$spreadsheet->getDefaultStyle()
            ->getFont()
            ->setName('Arial')
            ->setSize(10);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('A')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('B')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('C')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('D')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('E')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('F')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('G')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('H')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('I')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('J')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('K')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('L')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('M')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('N')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('O')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('P')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('Q')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('R')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('S')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('T')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('U')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('V')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('W')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('X')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('Y')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('Z')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AB')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AC')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AD')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('AE')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AF')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AG')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AH')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AI')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AJ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AK')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('AL')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AM')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AN')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AO')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AP')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AQ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AR')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AS')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AT')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AU')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AV')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AW')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AX')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AY')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('AZ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BB')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BC')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BD')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('BE')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BF')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BG')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BH')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BI')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BJ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BK')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('BL')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BM')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BN')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BO')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BP')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BQ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BR')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BS')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BT')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BU')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BV')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BW')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BX')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BY')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('BZ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CB')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CC')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CD')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('CE')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CF')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CG')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CH')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CI')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CJ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()->getStyle('CJ2')
            ->getNumberFormat()
            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CK')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('CL')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CM')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CN')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CO')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CP')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CQ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CR')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CS')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CT')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CU')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CV')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CW')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CX')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CY')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('CZ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DB')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DC')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DD')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('DE')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DF')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DG')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DH')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DI')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DJ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DK')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('DL')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DM')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DN')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DO')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DP')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DQ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DR')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DS')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DT')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DU')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DV')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DW')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DX')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DY')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('DZ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EB')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EC')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('ED')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('EE')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EF')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EG')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EH')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EI')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EJ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EK')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('EL')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EM')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EN')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EO')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EP')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EQ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('ER')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('ES')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('ET')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EU')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EV')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EW')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EX')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EY')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('EZ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FB')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FC')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FD')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('FE')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FF')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FG')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FH')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FI')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FJ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FK')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('FL')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FM')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FN')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FO')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FP')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FQ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FR')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FS')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FT')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FU')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FV')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FW')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FX')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FY')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('FZ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GB')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GC')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GD')
            ->setAutoSize(true);
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('GE')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GF')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GG')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GH')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GI')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GJ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GK')
            ->setAutoSize(true); 
            
$spreadsheet->getActiveSheet()
            ->getColumnDimension('GL')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GM')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GN')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GO')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GP')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GQ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GR')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GS')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GT')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GU')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GV')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GW')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GX')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GY')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('GZ')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getColumnDimension('HA')
            ->setAutoSize(true);

$spreadsheet->getActiveSheet()
            ->getStyle('A1:HA1')
            ->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('55cbdd');

//set cell values
$spreadsheet->getActiveSheet()
            ->setCellValue('A1', 'Bank Code')
            ->setCellValue('B1', 'Form No')
            ->setCellValue('C1', 'Application Type')
            ->setCellValue('D1', 'Application Sub Type')
            ->setCellValue('E1', 'Customer Type')
            ->setCellValue('F1', 'Program Code')
            ->setCellValue('G1', 'Existing Device Number')
            ->setCellValue('H1', 'Existing Client Code')
            ->setCellValue('I1', 'Existing Add-on Client Code')
            ->setCellValue('J1', 'Relation with Primary Client')
            ->setCellValue('K1', 'Wallet Plan 1 Promo')
            ->setCellValue('L1', 'Wallet Plan 2 Promo')
            ->setCellValue('M1', 'Wallet Plan 3 Promo')
            ->setCellValue('N1', 'Device Type 1')
            ->setCellValue('O1', 'Device Plan Code 1')
            ->setCellValue('P1', 'Device Plan Promo Code 1')
            ->setCellValue('Q1', 'Device Photo Indicator 1')
            ->setCellValue('R1', 'Device Type 2')
            ->setCellValue('S1', 'Device Plan Code 2')
            ->setCellValue('T1', 'Device Plan Promo Code 2')
            ->setCellValue('U1', 'Device Photo Indicator 2')
            ->setCellValue('V1', 'Device Type 3')
            ->setCellValue('W1', 'Device Plan Code 3')
            ->setCellValue('X1', 'Device Plan Promo Code 3')
            ->setCellValue('Y1', 'Device Photo Indicator 3')
            ->setCellValue('Z1', 'Device Type 4')
            ->setCellValue('AA1', 'Device Plan Code 4')
            ->setCellValue('AB1', 'Device Plan Promo Code 4')
            ->setCellValue('AC1', 'Device Photo Indicator 4')
            ->setCellValue('AD1', 'Device Type 5')
            ->setCellValue('AE1', 'Device Plan Code 5')
            ->setCellValue('AF1', 'Device Plan Promo Code 5')
            ->setCellValue('AG1', 'Device Photo Indicator 5')
            ->setCellValue('AH1', 'Device Type 6')
            ->setCellValue('AI1', 'Device Plan Code 6')
            ->setCellValue('AJ1', 'Device Plan Promo Code 6')
            ->setCellValue('AK1', 'Device Photo Indicator 6')
            ->setCellValue('AL1', 'Branch Code')
            ->setCellValue('AM1', 'Corporate Client Code')
            ->setCellValue('AN1', 'Title')
            ->setCellValue('AO1', 'First Name')
            ->setCellValue('AP1', 'Middle Name 1')
            ->setCellValue('AQ1', 'Middle Name 2')
            ->setCellValue('AR1', 'Last Name')
            ->setCellValue('AS1', 'Gender')
            ->setCellValue('AT1', 'Maiden Name')
            ->setCellValue('AU1', 'Married')
            ->setCellValue('AV1', 'Nationality')
            ->setCellValue('AW1', 'Birth Date')
            ->setCellValue('AX1', 'Birth City')
            ->setCellValue('AY1', 'Birth Country')
            ->setCellValue('AZ1', 'Education')
            ->setCellValue('BA1', 'VIP Flag')
            ->setCellValue('BB1', 'Embossed Name')
            ->setCellValue('BC1', 'Encoded Name')
            ->setCellValue('BD1', 'KYC Status')
            ->setCellValue('BE1', 'KYC Remarks')
            ->setCellValue('BF1', 'Travel Purpose')
            ->setCellValue('BG1', 'Picture Code')
            ->setCellValue('BH1', 'Photo Code')
            ->setCellValue('BI1', 'Preferred Mailing Address')
            ->setCellValue('BJ1', 'Current Address Line 1')
            ->setCellValue('BK1', 'Current Address Line 2')
            ->setCellValue('BL1', 'Current Address Line 3')
            ->setCellValue('BM1', 'Current Address Line 4')
            ->setCellValue('BN1', 'Current City Code')
            ->setCellValue('BO1', 'Current State Code')
            ->setCellValue('BP1', 'Current Country Code')
            ->setCellValue('BQ1', 'Current ZIP Code')
            ->setCellValue('BR1', 'Current Phone Number 1')
            ->setCellValue('BS1', 'Current Phone Number 2')
            ->setCellValue('BT1', 'Permanent Address Line 1')
            ->setCellValue('BU1', 'Permanent Address Line 2')
            ->setCellValue('BV1', 'Permanent Address Line 3')
            ->setCellValue('BW1', 'Permanent Address Line 4')
            ->setCellValue('BX1', 'Permanent City Code')
            ->setCellValue('BY1', 'Permanent State Code')
            ->setCellValue('BZ1', 'Permanent Country Code')
            ->setCellValue('CA1', 'Permanent ZIP Code')
            ->setCellValue('CB1', 'Permanent Phone Number 1')
            ->setCellValue('CC1', 'Permanent Phone Number 2')
            ->setCellValue('CD1', 'Fax Number')
            ->setCellValue('CE1', 'Register for DNCR')
            ->setCellValue('CF1', 'SMS Alert List')
            ->setCellValue('CG1', 'Email Alert List')
            ->setCellValue('CH1', 'Statement Preference')
            ->setCellValue('CI1', 'Delivery Mode')
            ->setCellValue('CJ1', 'Registered Mobile ISD Code')
            ->setCellValue('CK1', 'Registered Mobile Number')
            ->setCellValue('CL1', 'Registered Mail ID')
            ->setCellValue('CM1', 'Language Preference')
            ->setCellValue('CN1', 'Office Address Line 1')
            ->setCellValue('CO1', 'Office Address Line 2')
            ->setCellValue('CP1', 'Office Address Line 3')
            ->setCellValue('CQ1', 'Office Address Line 4')
            ->setCellValue('CR1', 'Office City Code')
            ->setCellValue('CS1', 'Office State Code')
            ->setCellValue('CT1', 'Office Country Code')
            ->setCellValue('CU1', 'Office ZIP Code')
            ->setCellValue('CV1', 'Office Phone Number 1')
            ->setCellValue('CW1', 'Office Phone Number 2')
            ->setCellValue('CX1', 'Office Email ID')
            ->setCellValue('CY1', 'Office ISD Code')
            ->setCellValue('CZ1', 'Office Mobile Number')
            ->setCellValue('DA1', 'Legal ID 1 Type')
            ->setCellValue('DB1', 'Legal ID 1')
            ->setCellValue('DC1', 'Legal ID 1 Expiry Date')
            ->setCellValue('DD1', 'Legal ID 1 Issuance Place')
            ->setCellValue('DE1', 'Legal ID 2 Type')
            ->setCellValue('DF1', 'Legal ID 2')
            ->setCellValue('DG1', 'Legal ID 2 Expiry Date')
            ->setCellValue('DH1', 'Legal ID 2 Issuance Place')
            ->setCellValue('DI1', 'Legal ID 3 Type')
            ->setCellValue('DJ1', 'Legal ID 3')
            ->setCellValue('DK1', 'Legal ID 3 Expiry Date')
            ->setCellValue('DL1', 'Legal ID 3 Issuance Place')
            ->setCellValue('DM1', 'Legal ID 4 Type')
            ->setCellValue('DN1', 'Legal ID 4')
            ->setCellValue('DO1', 'Legal ID 4 Expiry Date')
            ->setCellValue('DP1', 'Legal ID 4 Issuance Place')
            ->setCellValue('DQ1', 'Memo')
            ->setCellValue('DR1', 'Client Custom Date 1')
            ->setCellValue('DS1', 'Client Custom Date 2')
            ->setCellValue('DT1', 'Client Custom Date 3')
            ->setCellValue('DU1', 'Client Custom Date 4')
            ->setCellValue('DV1', 'Client Custom Date 5')
            ->setCellValue('DW1', 'Client Custom Data 1(HEI Name)')
            ->setCellValue('DX1', 'Client Custom Data 2(TES Award Number)')
            ->setCellValue('DY1', 'Client Custom Data 3(Application Form Batch Number)')
            ->setCellValue('DZ1', 'Client Custom Data 4(HEI Region)')
            ->setCellValue('EA1', 'Client Custom Data 5')
            ->setCellValue('EB1', 'Client Custom Number 1')
            ->setCellValue('EC1', 'Client Custom Number 2')
            ->setCellValue('ED1', 'Client Custom Number 3')
            ->setCellValue('EE1', 'Client Custom Number 3')
            ->setCellValue('EF1', 'Client Custom Number 5')
            ->setCellValue('EG1', 'Device Custom Date 1')
            ->setCellValue('EH1', 'Device Custom Date 2')
            ->setCellValue('EI1', 'Device Custom Date 3')
            ->setCellValue('EJ1', 'Device Custom Date 4')
            ->setCellValue('EK1', 'Device Custom Date 5')
            ->setCellValue('EL1', 'Device Custom Data 1')
            ->setCellValue('EM1', 'Device Custom Data 2')
            ->setCellValue('EN1', 'Device Custom Data 3')
            ->setCellValue('EO1', 'Device Custom Data 4')
            ->setCellValue('EP1', 'Device Custom Data 5')
            ->setCellValue('EQ1', 'Device Custom Number 1')
            ->setCellValue('ER1', 'Device Custom Number 2')
            ->setCellValue('ES1', 'Device Custom Number 3')
            ->setCellValue('ET1', 'Device Custom Number 4')
            ->setCellValue('EU1', 'Device Custom Number 5')
            ->setCellValue('EV1', 'Wallet Custom Date 1')
            ->setCellValue('EW1', 'Wallet Custom Date 2')
            ->setCellValue('EX1', 'Wallet Custom Date 3')
            ->setCellValue('EY1', 'Wallet Custom Date 4')
            ->setCellValue('EZ1', 'Wallet Custom Date 5')
            ->setCellValue('FA1', 'Wallet Custom Data 1')
            ->setCellValue('FB1', 'Wallet Custom Data 2')
            ->setCellValue('FC1', 'Wallet Custom Data 3')
            ->setCellValue('FD1', 'Wallet Custom Data 4')
            ->setCellValue('FE1', 'Wallet Custom Data 5')
            ->setCellValue('FF1', 'Wallet Custom Number 1')
            ->setCellValue('FG1', 'Wallet Custom Number 2')
            ->setCellValue('FH1', 'Wallet Custom Number 3')
            ->setCellValue('FI1', 'Wallet Custom Number 4')
            ->setCellValue('FJ1', 'Wallet Custom Number 5')
            ->setCellValue('FK1', 'Employment Status')
            ->setCellValue('FL1', 'Employee ID')
            ->setCellValue('FM1', 'Employer Name')
            ->setCellValue('FN1', 'Employee Designation')
            ->setCellValue('FO1', 'Employee Department')
            ->setCellValue('FP1', 'Company Type')
            ->setCellValue('FQ1', 'Current Job Tenure')
            ->setCellValue('FR1', 'Occupation')
            ->setCellValue('FS1', 'Applicant Profession')
            ->setCellValue('FT1', 'Employee Joining Date')
            ->setCellValue('FU1', 'Travel Type Code')
            ->setCellValue('FV1', 'Travel/Destination Country')
            ->setCellValue('FW1', 'Travel Start Date')
            ->setCellValue('FX1', 'Travel End Date')
            ->setCellValue('FY1', 'Client Customer ID')
            ->setCellValue('FZ1', 'Risk Category Value')
            ->setCellValue('GA1', 'Cobrand Number')
            ->setCellValue('GB1', 'Reuter Reference Number')
            ->setCellValue('GC1', 'CBS Reference Number')
            ->setCellValue('GD1', 'Alternate Name')
            ->setCellValue('GE1', 'For Future Use')
            ->setCellValue('GF1', 'For Future Use')
            ->setCellValue('GG1', 'For Future Use')
            ->setCellValue('GH1', 'For Future Use')
            ->setCellValue('GI1', 'For Future Use')
            ->setCellValue('GJ1', 'For Future Use')
            ->setCellValue('GK1', 'For Future Use')
            ->setCellValue('GL1', 'For Future Use')
            ->setCellValue('GM1', 'For Future Use')
            ->setCellValue('GN1', 'For Future Use')
            ->setCellValue('GO1', 'For Future Use')
            ->setCellValue('GP1', 'For Future Use')
            ->setCellValue('GQ1', 'For Future Use')
            ->setCellValue('GR1', 'For Future Use')
            ->setCellValue('GS1', 'For Future Use')
            ->setCellValue('GT1', 'For Future Use')
            ->setCellValue('GU1', 'For Future Use')
            ->setCellValue('GV1', 'For Future Use')
            ->setCellValue('GW1', 'For Future Use')
            ->setCellValue('GX1', 'For Future Use')
            ->setCellValue('GY1', 'Lodging Mode')
            ->setCellValue('GZ1', 'Permanent Address From')
            ->setCellValue('HA1', 'Checksum');





//set font to bold
$spreadsheet->getActiveSheet()
            ->getStyle('A1:HA1')
            ->getFont()
            ->setBold(true);
           
    if(!empty($_POST['sel_reexport'])){
        $sql = "SELECT *
        FROM tbl_lbp_form 
        WHERE 
        ac_year = '".$_POST['sel_academic_year']."' 
        AND date_exported != '' AND application_datfile_export_date IS NOT NULL AND application_datfile_export_date = '".$_POST['sel_reexport']."' LIMIT 200";
    }
    else{
        $sql = "SELECT * FROM u246964555_ufdb.tbl_lbp_form WHERE status = 'App-DAT' AND application_datfile_export_date BETWEEN '2021-03-24' AND '2021-03-31'";
    }

$result = mysqli_query($connect, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){
    $i = 2;
    $row_number = 1;
    while($row = mysqli_fetch_assoc($result)){
        
        $app_id = $row['app_id'];
        $award_no = $row['award_no'];
//         $ac_year =$row['ac_year'];
        $lname = $row['lname'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $sex = $row['sex'];
        $birthdate = $row['birthdate'];
        $m_fname = $row['m_fname'];
        $m_mname = $row['m_mname'];
        $m_lname = $row['m_lname'];
        $hei_uii =$row['hei_uii'];
        $birth_place = $row['birth_place'];
        $nationality = $row['nationality'];
        $present_street = $row['present_street'];
        $present_barangay = $row['present_barangay'];
        $present_city = $row['present_city'];
        $present_province = $row['present_province'];
        $present_zip =$row['present_zip'];
        $permanent_street = $row['permanent_street'];
        $permanent_barangay = $row['permanent_barangay'];
        $permanent_city = $row['permanent_city'];
        $permanent_province = $row['permanent_province'];
        $permanent_zip =$row['permanent_zip'];
        $contact = $row['contact'];
        $email = $row['email'];
        $lbp_branch =$row['lbp_branch'];
        $id_number = $row['id_number'];
        $id_type = $row['id_type'];
        $id_expire_date =$row['id_expire_date'];
        $emboss_name = $row['emboss_name'];
        $title =$row['title'];
        $marital_status =$row['marital_status'];
        $profession = $row['profession'];
        $source_of_fund_id = $row['source_of_fund_id'];
        $gross_salary_id = $row['gross_salary_id'];
        $tin = $row['tin'];
        $date_exported =$row['date_exported'];
        $pickup_at_hei=$row['pickup_at_hei'];
        $hei_psg_region=$row['hei_psg_region'];
        $lbp_branch_code=$row['lbp_branch_code'];
        $row_number = $row_number;
                
            $branchCode;
            if($pickup_at_hei == '0'){
                $sqlBranchCode = "SELECT branch_code FROM tbl_lbp_branches WHERE branch_name = '$lbp_branch'";
                $resBranchCode = mysqli_query($connect, $sqlBranchCode);
                $checkBranchCode = mysqli_num_rows($resBranchCode);
                if($checkBranchCode > 0){
                    while($row=mysqli_fetch_assoc($resBranchCode)){
                        $branchCode = $row['branch_code'];
                    }
                }
            }
            elseif($pickup_at_hei == '1'){
                $sqlBranchCode = "SELECT branch_code FROM tbl_lbp_servicing_branches WHERE hei_uii = '$hei_uii'";
                $resBranchCode = mysqli_query($connect, $sqlBranchCode);
                $checkBranchCode = mysqli_num_rows($resBranchCode);
                if($checkBranchCode > 0){
                    while($row=mysqli_fetch_assoc($resBranchCode)){
                        $branchCode = $row['branch_code'];
                    }
                }
            }

        // BATCH Numbering
        if($row_number >= 1 || $row_number <= 50){
            $batch_number = 1;
        }
        elseif($row_number >= 51 || $row_number <= 100){
            $batch_number = 2;
        }
        elseif($row_number >= 101 || $row_number <= 150){
            $batch_number = 3;
        }
        elseif($row_number >= 151 || $row_number <= 200){
            $batch_number = 4;
        }

        // USE BLANK IF Middle Name is N/A        
        if($mname == 'N/A' || $mname == 'n/a'){
            $mname = '';
        }
        if(strpos($mname, 'N/A')|| strpos($mname, 'N/A')){
            $mname = '';   
        }
                
            if($pickup_at_hei == '1'){
                $sqlHEIName = 'SELECT hei_name FROM tbl_heis WHERE hei_uii ="'.$hei_uii.'"';
                $resHEIName = mysqli_query($connect, $sqlHEIName);
                $checkHEIName = mysqli_num_rows($resHEIName);
                if($checkHEIName >= 1){
                    while($row = mysqli_fetch_assoc($resHEIName)){
                        $pickup = $row['hei_name'];
                        $sqlServicingBranch = 'SELECT * FROM tbl_lbp_servicing_branches WHERE hei_name = "'.$pickup.'"';
                        $resServicingBranch = mysqli_query($connect, $sqlServicingBranch);
                        $checkServicingBranch = mysqli_num_rows($resServicingBranch);
                        if($checkServicingBranch >= 1){
                            while($row = mysqli_fetch_assoc($resServicingBranch)){
                                $servicing_branch = $row['branch'];
                                        
                                if($servicing_branch == '#N/A' || $servicing_branch == '' || $servicing_branch == NULL){
                                    $servicing_branch = 'N/A';
                                }
                            }
                        }
                        else{
                            $servicing_branch = 'N/A';
                        }        
                    }
                }
            }
            elseif($pickup_at_hei == '0' || $pickup_at_hei == ''){
                $pickup = $lbp_branch;
                $servicing_branch = "N/A";
            }
                
            //GET HEI Name
            $sqlForHEIName = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '$hei_uii'";
            $resForHEIName = mysqli_query($connect, $sqlForHEIName);
            $checkForHEIName = mysqli_num_rows($resForHEIName);
            if($checkForHEIName > 0){
                while($row = mysqli_fetch_assoc($resForHEIName)){
                    $hei_name = $row['hei_name'];
                }
            }
                
            

        $newbirthdate = date('dmY', strtotime($birthdate));
        $id_expire_date = date('dmY', strtotime($id_expire_date));

        $motherfullname = $m_fname.' '.$m_mname.' '.$m_lname;
                
            // remove dash in names
            $lname = str_replace('-', '', $lname);
            $fname = str_replace('-', '', $fname);
            $mname = str_replace('-', '', $mname);
            $m_fname = str_replace('-', '', $m_fname);
            $m_mname = str_replace('-', '', $m_mname);
            $m_lname = str_replace('-', '', $m_lname);

            // remove dot in names
            $lname = str_replace('.', '', $lname);
            $fname = str_replace('.', '', $fname);
            $mname = str_replace('.', '', $mname);
            $m_fname = str_replace('.', '', $m_fname);
            $m_mname = str_replace('.', '', $m_mname);
            $m_lname = str_replace('.', '', $m_lname);

        if($sex == "MALE" || $sex == "Male" || $sex == "male" || $sex == "M" || $sex == "m"){
            $sex = "M";
        }
        elseif($sex == "FEMALE" || $sex == "Female" || $sex == "female" || $sex == "F" || $sex == "f"){
            $sex = "F";
        }
        else{
            $sex = "N";
        }

        $isd_code = "+63";

        $emboss_name = strtoupper($emboss_name);

        $current_address = $present_street." ".$present_barangay." ".$present_city." ".$present_province." ".$present_zip;
        $permanent_address = $permanent_street." ".$permanent_barangay." ".$permanent_city." ".$permanent_province." ".$permanent_zip;
        $contact = substr($contact, 3);

        if($title == 'Mr'){
            $title = '1';
        }
        elseif($title == 'Ms'){
            $title = '3';
        }
        elseif($title == 'Mrs'){
            $title = '2';
        }

        if($marital_status == 'Single'){
            $marital_status = '0';
        }
        elseif($marital_status == 'Married'){
            $marital_status = '1';
        }
        elseif($marital_status == 'Divorced'){
            $marital_status = '2';
        }
        // remove comma's in address
        $current_address = str_replace(',', '', $current_address);
        $permanent_address = str_replace(',', '', $permanent_address);
                
        //GET SOURCE OF FUND VALUE
        $sqlSource = "SELECT source FROM tbl_lbp_source_fund WHERE source_id = ".$source_of_fund_id;
        $resSource = mysqli_query($connect, $sqlSource);
        $checkSource = mysqli_num_rows($resSource);
        while($row = mysqli_fetch_assoc($resSource)){
            $sourceOfFund = $source_of_fund_id.' - '.$row['source'];
        }

        //GET GROSS SALARY VALUE
        $sqlGrossSalary = "SELECT salary_range FROM tbl_lbp_gross_salary WHERE gsalary_id = ".$gross_salary_id;
        $resGrossSalary = mysqli_query($connect, $sqlGrossSalary);
        $checkGrossSalary = mysqli_num_rows($resGrossSalary);
        while($row = mysqli_fetch_assoc($resGrossSalary)){
            $grossSalary = $gross_salary_id.' - '.$row['salary_range'];
        }

        //GET ID VALUE
        $sqlID = "SELECT id_type_name FROM tbl_lbp_id_type WHERE id_type = ".$id_type;
        $resID = mysqli_query($connect, $sqlID);
        $checkID = mysqli_num_rows($resID);
        while($row = mysqli_fetch_assoc($resID)){
            $ID = $row['id_type_name'];
        }
        $spreadsheet->getActiveSheet()
                    ->setCellValue('A'.$i, iconv("ISO-8859-1", "UTF-8", "017188"))
                    ->setCellValue('B'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('C'.$i, iconv("ISO-8859-1", "UTF-8", "P"))
                    ->setCellValue('D'.$i, iconv("ISO-8859-1", "UTF-8", "N"))
                    ->setCellValue('E'.$i, iconv("ISO-8859-1", "UTF-8", "0"))
                    ->setCellValue('F'.$i, iconv("ISO-8859-1", "UTF-8", "GPRLBP"))
                    ->setCellValue('G'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('H'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('I'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('J'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('K'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('L'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('M'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('N'.$i, iconv("ISO-8859-1", "UTF-8", "4"))
                    ->setCellValue('O'.$i, iconv("ISO-8859-1", "UTF-8", "GPRDP01"))
                    ->setCellValue('P'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('Q'.$i, iconv("ISO-8859-1", "UTF-8", "0"))
                    ->setCellValue('R'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('S'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('T'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('U'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('V'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('W'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('X'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('Y'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('Z'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AA'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AB'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AC'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AD'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AE'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AF'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AG'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AH'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AI'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AJ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AK'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AL'.$i, iconv("ISO-8859-1", "UTF-8", "003"))
                    ->setCellValue('AM'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AN'.$i, iconv("ISO-8859-1", "UTF-8", $title))
                    ->setCellValue('AO'.$i, iconv("ISO-8859-1", "UTF-8", $fname))
                    ->setCellValue('AP'.$i, iconv("ISO-8859-1", "UTF-8", $mname))
                    ->setCellValue('AQ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('AR'.$i, iconv("ISO-8859-1", "UTF-8", $lname))
                    ->setCellValue('AS'.$i, iconv("ISO-8859-1", "UTF-8", $sex))
                    ->setCellValue('AT'.$i, iconv("ISO-8859-1", "UTF-8", $motherfullname))
                    ->setCellValue('AU'.$i, iconv("ISO-8859-1", "UTF-8", $marital_status))
                    ->setCellValue('AV'.$i, iconv("ISO-8859-1", "UTF-8", "608"))
                    ->setCellValue('AW'.$i, iconv("ISO-8859-1", "UTF-8", $newbirthdate))
                    ->setCellValue('AX'.$i, iconv("ISO-8859-1", "UTF-8", $birth_place))
                    ->setCellValue('AY'.$i, iconv("ISO-8859-1", "UTF-8", "608"))
                    ->setCellValue('AZ'.$i, iconv("ISO-8859-1", "UTF-8", "2"))
                    ->setCellValue('BA'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BB'.$i, iconv("ISO-8859-1", "UTF-8", $emboss_name))
                    ->setCellValue('BC'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BD'.$i, iconv("ISO-8859-1", "UTF-8", "Y"))
                    ->setCellValue('BE'.$i, iconv("ISO-8859-1", "UTF-8", "Compliant"))
                    ->setCellValue('BF'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BG'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BH'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BI'.$i, iconv("ISO-8859-1", "UTF-8", "C"))
                    ->setCellValue('BJ'.$i, iconv("ISO-8859-1", "UTF-8", $branchCode.' '.$current_address))
                    ->setCellValue('BK'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BL'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BM'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BN'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BO'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BP'.$i, iconv("ISO-8859-1", "UTF-8", "608"))
                    ->setCellValue('BQ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValueExplicit('BR'.$i, iconv("ISO-8859-1", "UTF-8", $contact),\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                    ->setCellValue('BS'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BT'.$i, iconv("ISO-8859-1", "UTF-8", $permanent_address))
                    ->setCellValue('BU'.$i, iconv("ISO-8859-1", "UTF-8", $permanent_address))
                    ->setCellValue('BV'.$i, iconv("ISO-8859-1", "UTF-8", $permanent_address))
                    ->setCellValue('BW'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BX'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BY'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('BZ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CA'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValueExplicit('CB'.$i, iconv("ISO-8859-1", "UTF-8", $contact),\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                    ->setCellValue('CC'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CD'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CE'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CF'.$i, iconv("ISO-8859-1", "UTF-8", "Y"))
                    ->setCellValue('CG'.$i, iconv("ISO-8859-1", "UTF-8", "Y"))
                    ->setCellValue('CH'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CI'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValueExplicit('CJ'.$i, iconv("ISO-8859-1", "UTF-8", $isd_code),\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)                    
                    ->setCellValueExplicit('CK'.$i, iconv("ISO-8859-1", "UTF-8", $contact),\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                    ->setCellValue('CL'.$i, iconv("ISO-8859-1", "UTF-8", $email))
                    ->setCellValue('CM'.$i, iconv("ISO-8859-1", "UTF-8", "en"))
                    ->setCellValueExplicit('CN'.$i, iconv("ISO-8859-1", "UTF-8", $pickup),\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                    ->setCellValueExplicit('CO'.$i, iconv("ISO-8859-1", "UTF-8", $servicing_branch),\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                    ->setCellValue('CP'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CQ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CR'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CS'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CT'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CU'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CV'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CW'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CX'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CY'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('CZ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DA'.$i, iconv("ISO-8859-1", "UTF-8", "02"))
                    ->setCellValueExplicit('DB'.$i, iconv("ISO-8859-1", "UTF-8", $id_number),\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING)
                    ->setCellValue('DC'.$i, iconv("ISO-8859-1", "UTF-8", $id_expire_date))
                    ->setCellValue('DD'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DE'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DF'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DG'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DH'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DI'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DJ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DK'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DL'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DM'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DN'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DO'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DP'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DQ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DR'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DS'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DT'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DU'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DV'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('DW'.$i, iconv("ISO-8859-1", "UTF-8", $hei_name))
                    ->setCellValue('DX'.$i, iconv("ISO-8859-1", "UTF-8", $award_no))
                    ->setCellValue('DY'.$i, iconv("ISO-8859-1", "UTF-8", $batch_number))
                    ->setCellValue('DZ'.$i, iconv("ISO-8859-1", "UTF-8", $hei_psg_region))
                    ->setCellValue('EA'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EB'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EC'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('ED'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EE'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EF'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EG'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EH'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EI'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EJ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EK'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EL'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EM'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EN'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EO'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EP'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EQ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('ER'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('ES'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('ET'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EU'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EV'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EW'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EX'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EY'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('EZ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FA'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FB'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FC'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FD'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FE'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FF'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FG'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FH'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FI'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FJ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FK'.$i, iconv("ISO-8859-1", "UTF-8", "7"))
                    ->setCellValue('FL'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FM'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FN'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FO'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FP'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FQ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FR'.$i, iconv("ISO-8859-1", "UTF-8", "5"))
                    ->setCellValue('FS'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FT'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FU'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FV'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FW'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FX'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FY'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('FZ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GA'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GB'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GC'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GD'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GE'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GF'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GG'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GH'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GI'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GJ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GK'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GL'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GM'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GN'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GO'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GP'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GQ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GR'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GS'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GT'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GU'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GV'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GW'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GX'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GY'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('GZ'.$i, iconv("ISO-8859-1", "UTF-8", ""))
                    ->setCellValue('HA'.$i, iconv("ISO-8859-1", "UTF-8", ""));
        $i++;
        $row_number++;
    }
}


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$_POST['sel_academic_year'].' Batch Opening Template.xlsx"');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
}

// EXPORT APPLICATION DAT FILE ------------------------------------------------------------------------------------------------------------------------------------------------
if(isset($_POST['btn_generate_datfile'])){

    if(!empty($_POST['sel_reexport'])){
        $sql = "SELECT *
        FROM tbl_lbp_form a INNER JOIN tbl_lbp_servicing_branches b ON a.hei_uii = b.hei_uii
        WHERE 
        application_datfile_name = '".$_POST['sel_reexport']."'";
    }
    else{
           $sql = "SELECT DISTINCT(a.award_no), a.uid, a.app_id, a.hei_uii, a.fname, a.mname, a.lname, a.birthdate, a.birth_place, a.m_fname, a.m_mname, a.m_lname, a.nationality, a.sex, a.title, a.marital_status, a.permanent_street, a.permanent_barangay, a.permanent_city, a.permanent_province, a.permanent_zip, a.present_street, a.present_barangay, a.present_city, a.present_province, a.present_zip, a.contact, a.email, a.lbp_branch_region, a.lbp_branch_code, a.lbp_branch, a.id_number, a.id_expire_date, a.id_type, a.emboss_name, a.profession, a.source_of_fund_id, a.gross_salary_id, a.tin, a.def_password, a.password, a.date_exported, a.photo, a.id_front_photo, a.id_back_photo, a.pdf_attachment, a.privacy_agreement, a.editable_fields, a.pickup_at_hei, a.application_datfile_export_date, a.application_datfile_name, a.application_datfile_batch, a.application_datfile_sequence, a.wallet_number, a.device_number, a.transaction_datfile_export_date, a.status, a.remarks, a.tag, b.uid, b.region, b.hei_name, b.branch_code, b.branch FROM tbl_lbp_form a INNER JOIN tbl_lbp_servicing_branches b ON a.hei_uii = b.hei_uii WHERE b.hei_uii IS NOT NULL AND b.hei_uii != '' AND a.status = 'SubToUniFAST' AND a.date_exported != '' AND a.application_datfile_export_date IS NULL AND a.tag IS NOT NULL AND a.tag != 'DUPLICATE' AND a.lbp_branch_code IS NOT NULL ORDER BY b.hei_uii LIMIT 1000";
    }
            
    $result = mysqli_query($connect, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        $currentdateHeader = date('dmY');

        // SELECT THE LATEST SEQUENCE NUMBER
        $sqlLatestSequence = "SELECT DISTINCT(application_datfile_sequence) FROM tbl_lbp_form ORDER BY application_datfile_sequence DESC LIMIT 1";
        $resLatestSequence = mysqli_query($connect, $sqlLatestSequence);
        $checkLatestSequence = mysqli_num_rows($resLatestSequence);
        if($checkLatestSequence > 0){
                    while($row = mysqli_fetch_assoc($resLatestSequence)){
                        $lastSequenceNumber = $row['application_datfile_sequence'];
                    }
        }
        $concatZero;
        $newSequenceNumber = $lastSequenceNumber + 1;
        $seqNumberLen = strlen($newSequenceNumber);
        if($seqNumberLen == 1){
            $concatZero = '00000';
        }
        elseif($seqNumberLen == 2){
            $concatZero = '0000';
        }
        elseif($seqNumberLen == 3){
            $concatZero = '000';
        }
        elseif($seqNumberLen == 4){
            $concatZero = '00';
        }
        elseif($seqNumberLen == 5){
            $concatZero = '0';
        }
        elseif($seqNumberLen == 6){
            $concatZero = '';
        }
                
        $sequenceNumber = $concatZero.$newSequenceNumber;
//             $sequenceNumber = '000001';

        //FILE NAME of DAT File
        $application_datfile_name = $filetype.''.$product.''.$bankcode.''.$currentdate.''.$currenttime.''.$sequenceNumber;

        //HEADER of DAT File
        echo 'HD|'.$bankcode.'|'.$currentdateHeader.''.$currenttime.'|2.0'."\r\n";
         
        $exportDate = date('Y-m-d');        

        $row_number = 1;
        $application_datfile_name_CURRENT = '';
                
    while($row = mysqli_fetch_assoc($result)){

            //INIT VARIABLES
            $award_no = $row['award_no'];
            $lname = $row['lname'];
            $fname = $row['fname'];
            $mname = $row['mname'];            
            $row_number = $row_number;
                
            //AUTOMATE EMBOSS NAME
            $mname_emboss = $mname;
            while(strlen($mname_emboss) > 1){
                $mname_emboss = substr($mname_emboss, 0, -1);
            }
            $new_emboss_mname = $mname_emboss;            
            $emboss_name = $fname.' '.$new_emboss_mname.' '.$lname;
            if (strlen($emboss_name) > 22){
                $string_difference = strlen($emboss_name) - 22;
                $fname_new = substr($fname, 0, -$string_difference);
                $emboss_name = $fname_new.' '.$new_emboss_mname.' '.$lname; 
            }
            $emboss_name = strtoupper($emboss_name);
            
            // BATCH Numbering
            if($row_number >= 1 && $row_number <= 50){
                $batch_number = '1';
            }
            elseif($row_number >= 51 && $row_number <= 100){
                $batch_number = '2';
            }
            elseif($row_number >= 101 && $row_number <= 150){
                $batch_number = '3';
            }
            elseif($row_number >= 151 && $row_number <= 200){
                $batch_number = '4';
            }
            elseif($row_number >= 201 && $row_number <= 250){
                $batch_number = '5';
            }
            elseif($row_number >= 251 && $row_number <= 300){
                $batch_number = '6';
            }
            elseif($row_number >= 301 && $row_number <= 350){
                $batch_number = '7';
            }
            elseif($row_number >= 351 && $row_number <= 400){
                $batch_number = '8';
            }
            elseif($row_number >= 401 && $row_number <= 450){
                $batch_number = '9';
            }
            elseif($row_number >= 451 && $row_number <= 500){
                $batch_number = '10';
            }
            elseif($row_number >= 501 && $row_number <= 550){
                $batch_number = '11';
            }
            elseif($row_number >= 551 && $row_number <= 600){
                $batch_number = '12';
            }
            elseif($row_number >= 601 && $row_number <= 650){
                $batch_number = '13';
            }
            elseif($row_number >= 651 && $row_number <= 700){
                $batch_number = '14';
            }
            elseif($row_number >= 701 && $row_number <= 750){
                $batch_number = '15';
            }
            elseif($row_number >= 751 && $row_number <= 800){
                $batch_number = '16';
            }
            elseif($row_number >= 801 && $row_number <= 850){
                $batch_number = '17';
            }
            elseif($row_number >= 851 && $row_number <= 900){
                $batch_number = '18';
            }
            elseif($row_number >= 901 && $row_number <= 950){
                $batch_number = '19';
            }
            elseif($row_number >= 951 && $row_number <= 1000){
                $batch_number = '20';
            }

            $updateEmbossName = 'UPDATE tbl_lbp_form SET emboss_name = "'.$emboss_name.'" WHERE award_no = "'.$award_no.'"';
            mysqli_query($connect, $updateEmbossName);

            //UPDATE TABLE TO INCLUDE IN DATA IN NEW DAT FILE
            if(empty($_POST['sel_reexport'])){
                $sqlUpdateExportDate = "UPDATE tbl_lbp_form SET application_datfile_export_date = '".$exportDate."', status = 'App-DAT', application_datfile_name = '".$application_datfile_name."', application_datfile_batch = '".$batch_number."', application_datfile_sequence = '".$sequenceNumber."' WHERE 
                award_no = '".$award_no."'";
                mysqli_query($connect, $sqlUpdateExportDate);

                $application_datfile_name_CURRENT = $application_datfile_name;
            }
            $row_number++;
        }

        $sqlCurrentDATFile = "SELECT * FROM tbl_lbp_form a INNER JOIN tbl_lbp_servicing_branches b ON a.hei_uii=b.hei_uii INNER JOIN tbl_heis c ON a.hei_uii=c.hei_uii WHERE a.application_datfile_name = '".$application_datfile_name_CURRENT."'";
        $resCurrentDATFile = mysqli_query($connect, $sqlCurrentDATFile);
        $checkCurrentDATFile = mysqli_num_rows($resCurrentDATFile);
        if($checkCurrentDATFile > 0){
            while($datfile_row = mysqli_fetch_assoc($resCurrentDATFile)){
                $award_no = $datfile_row['award_no'];
                $app_id = $datfile_row['app_id'];
                $lname = $datfile_row['lname'];
                $fname = $datfile_row['fname'];
                $mname = $datfile_row['mname'];
                $sex = $datfile_row['sex'];
                $birthdate = $datfile_row['birthdate'];
                $m_fname = $datfile_row['m_fname'];
                $m_mname = $datfile_row['m_mname'];
                $m_lname = $datfile_row['m_lname'];
                $hei_uii =$datfile_row['hei_uii'];
                $birth_place = $datfile_row['birth_place'];
                $nationality = $datfile_row['nationality'];
                $present_street = $datfile_row['present_street'];
                $present_barangay = $datfile_row['present_barangay'];
                $present_city = $datfile_row['present_city'];
                $present_province = $datfile_row['present_province'];
                $present_zip =$datfile_row['present_zip'];
                $permanent_street = $datfile_row['permanent_street'];
                $permanent_barangay = $datfile_row['permanent_barangay'];
                $permanent_city = $datfile_row['permanent_city'];
                $permanent_province = $datfile_row['permanent_province'];
                $permanent_zip =$datfile_row['permanent_zip'];
                $contact = $datfile_row['contact'];
                $email = $datfile_row['email'];
                $lbp_branch =$datfile_row['lbp_branch'];
                $id_number = $datfile_row['id_number'];
                $id_type = $datfile_row['id_type'];
                $id_expire_date =$datfile_row['id_expire_date'];
                $emboss_name = $datfile_row['emboss_name'];
                $title =$datfile_row['title'];
                $marital_status =$datfile_row['marital_status'];
                $profession = $datfile_row['profession'];
                $source_of_fund_id = $datfile_row['source_of_fund_id'];
                $gross_salary_id = $datfile_row['gross_salary_id'];
                $tin = $datfile_row['tin'];
                $date_exported =$datfile_row['date_exported'];
                $lbp_branch = $datfile_row['lbp_branch'];
                $pickup_at_hei=$datfile_row['pickup_at_hei'];
                $hei_psg_region=$datfile_row['hei_psg_region'];
                $lbp_branch_code=$datfile_row['lbp_branch_code'];
                $application_datfile_batch=$datfile_row['application_datfile_batch'];

                $branchCode;
                if($pickup_at_hei == '0'){
                    $sqlBranchCode = "SELECT branch_code FROM tbl_lbp_branches WHERE branch_name = '$lbp_branch'";
                    $resBranchCode = mysqli_query($connect, $sqlBranchCode);
                    $checkBranchCode = mysqli_num_rows($resBranchCode);
                    if($checkBranchCode > 0){
                        while($row=mysqli_fetch_assoc($resBranchCode)){
                            $branchCode = $row['branch_code'];
                        }
                    }
                }
                elseif($pickup_at_hei == '1'){
                    $sqlBranchCode = "SELECT branch_code FROM tbl_lbp_servicing_branches WHERE hei_uii = '$hei_uii'";
                    $resBranchCode = mysqli_query($connect, $sqlBranchCode);
                    $checkBranchCode = mysqli_num_rows($resBranchCode);
                    if($checkBranchCode > 0){
                        while($row=mysqli_fetch_assoc($resBranchCode)){
                            $branchCode = $row['branch_code'];
                        }
                    }
                }                   

                // USE BLANK IF Middle Name is N/A
                if($mname == 'N/A' || $mname == 'n/a'){
                    $mname = '';
                }
                if(strpos($mname, 'N/A')|| strpos($mname, 'N/A')){
                    $mname = '';   
                }

                if($pickup_at_hei == '1'){
                    $sqlHEIName = 'SELECT hei_name FROM tbl_heis WHERE hei_uii ="'.$hei_uii.'"';
                    $resHEIName = mysqli_query($connect, $sqlHEIName);
                    $checkHEIName = mysqli_num_rows($resHEIName);
                    if($checkHEIName >= 1){
                        while($row = mysqli_fetch_assoc($resHEIName)){
                            $pickup = $row['hei_name'];
                            
                            $sqlServicingBranch = 'SELECT * FROM tbl_lbp_servicing_branches WHERE hei_uii = "'.$hei_uii.'"';
                            $resServicingBranch = mysqli_query($connect, $sqlServicingBranch);
                            $checkServicingBranch = mysqli_num_rows($resServicingBranch);
                            if($checkServicingBranch >= 1){
                                while($row = mysqli_fetch_assoc($resServicingBranch)){
                                    $servicing_branch = $row['branch'];
    
                                    if($servicing_branch == '#N/A' || $servicing_branch == '' || $servicing_branch == NULL){
                                        $servicing_branch = 'N/A';
                                    }
                                }
                            }
                            else{
                                $servicing_branch = 'N/A';
                            }
                        }
                    }
                }
                elseif($pickup_at_hei == '0' || $pickup_at_hei == ''){
                    $pickup = $lbp_branch;
                    $servicing_branch = "N/A";
                }

                //GET HEI Name
                $sqlForHEIName = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '$hei_uii'";
                $resForHEIName = mysqli_query($connect, $sqlForHEIName);
                $checkForHEIName = mysqli_num_rows($resForHEIName);
                if($checkForHEIName > 0){
                    while($row = mysqli_fetch_assoc($resForHEIName)){
                        $hei_name = $row['hei_name'];
                    }
                }

                

                $newbirthdate = date('dmY', strtotime($birthdate));
                $id_expire_date = date('dmY', strtotime($id_expire_date));

                $motherfullname = $m_fname.' '.$m_mname.' '.$m_lname;

                if($sex == "MALE" || $sex == "Male" || $sex == "male" || $sex == "M" || $sex == "m"){
                    $sex = "M";
                }
                elseif($sex == "FEMALE" || $sex == "Female" || $sex == "female" || $sex == "F" || $sex == "f"){
                    $sex = "F";
                }
                else{
                    $sex = "N";
                }

                $isd_code = "+63";

                $emboss_name = strtoupper($emboss_name);

                $current_address = $present_street." ".$present_barangay." ".$present_city." ".$present_province." ".$present_zip;
                $permanent_address = $permanent_street." ".$permanent_barangay." ".$permanent_city." ".$permanent_province." ".$permanent_zip;
                
                $contact = substr($contact, 3);

                if($title == 'Mr'){
                    $title = '1';
                }
                elseif($title == 'Ms'){
                    $title = '3';
                }
                elseif($title == 'Mrs'){
                    $title = '2';
                }

                if($marital_status == 'Single'){
                    $marital_status = '0';
                }
                elseif($marital_status == 'Married'){
                    $marital_status = '1';
                }
                elseif($marital_status == 'Divorced'){
                    $marital_status = '2';
                }


                // remove comma's in address
                $current_address = str_replace(',', '', $current_address);
                $permanent_address = str_replace(',', '', $permanent_address);

                // remove dash in names
                $lname = str_replace('-', '', $lname);
                $fname = str_replace('-', '', $fname);
                $mname = str_replace('-', '', $mname);
                $m_fname = str_replace('-', '', $m_fname);
                $m_mname = str_replace('-', '', $m_mname);
                $m_lname = str_replace('-', '', $m_lname);

                // remove dot in names
                $lname = str_replace('.', '', $lname);
                $fname = str_replace('.', '', $fname);
                $mname = str_replace('.', '', $mname);
                $m_fname = str_replace('.', '', $m_fname);
                $m_mname = str_replace('.', '', $m_mname);
                $m_lname = str_replace('.', '', $m_lname);


                //GET SOURCE OF FUND VALUE
                $sqlSource = "SELECT source FROM tbl_lbp_source_fund WHERE source_id = ".$source_of_fund_id;
                $resSource = mysqli_query($connect, $sqlSource);
                $checkSource = mysqli_num_rows($resSource);
                while($row = mysqli_fetch_assoc($resSource)){
                    $sourceOfFund = $source_of_fund_id.' - '.$row['source'];
                }

                //GET GROSS SALARY VALUE
                $sqlGrossSalary = "SELECT salary_range FROM tbl_lbp_gross_salary WHERE gsalary_id = ".$gross_salary_id;
                $resGrossSalary = mysqli_query($connect, $sqlGrossSalary);
                $checkGrossSalary = mysqli_num_rows($resGrossSalary);
                while($row = mysqli_fetch_assoc($resGrossSalary)){
                    $grossSalary = $gross_salary_id.' - '.$row['salary_range'];
                }

                //GET ID VALUE
                $sqlID = "SELECT id_type_name FROM tbl_lbp_id_type WHERE id_type = ".$id_type;
                $resID = mysqli_query($connect, $sqlID);
                $checkID = mysqli_num_rows($resID);
                while($row = mysqli_fetch_assoc($resID)){
                    $ID = $row['id_type_name'];
                }
                echo '019372||P|N|0|GPRLBP||||||||4|GPRDP01||0|||||||||||||||||||||003||'.$title.'|'.$fname.'|'.$mname.'||'.$lname.'|'.$sex.'|'.$motherfullname.'|'.$marital_status.'|608|'.$newbirthdate.'|'.$birth_place.'|608|2||'.$emboss_name.'||Y|Compliant||||C|'.$lbp_branch_code.' '.$current_address.'||||||608||'.$contact.'||'.$permanent_address.'|'.$permanent_address.'|'.$permanent_address.'||||||'.$contact.'||||Y|Y|||'.$isd_code.'|'.$contact.'|'.$email.'|en|'.$pickup.'|'.$servicing_branch.'||||||||||||'.$id_type.'|'.$id_number.'|'.$id_expire_date.'||||||||||||||||||||'.$hei_name.'|'.$award_no.'|'.$application_datfile_batch.'|'.$hei_psg_region.'|||||||||||||||||||||||||||||||||||||7|||||||5|||||||||||||||||||||||||||||||||||'."\r\n";
                
            }     
            
            //FOOTER of DAT File
            $numdatas = strlen($resultCheck);
            $zeros = '000000000';
            $footer = substr($zeros, $numdatas).''.$resultCheck;

            echo 'FT|'.$footer;

            header('Content-Type: text/plain');
            header('Content-Disposition: attachment;filename="'.$filetype.''.$product.''.$bankcode.''.$currentdate.''.$currenttime.''.$sequenceNumber.'.dat"');
        }
        else{
            echo 'No Data to Fetch';
        }  
        
    }
    
}
// EXPORT TRANSACTION DAT FILE -----------------------------------------------------------------------------------------
    if(isset($_POST['btn_generate_transaction_datfile'])){

    //FILE NAMING VARIABLES
    $filetype = 'TXU';
    $bankcode = '019372';
    $currentdate = date('dmy');
    $currenttime = date('His');

    $sql = "SELECT wallet_number, device_number, fname, mname, lname
            FROM vw_for_admin 
            WHERE 
            ac_year = '".$_POST['sel_academic_year']."' 
            AND date_exported != '' 
            AND application_datfile_export_date IS NOT NULL            
            AND wallet_number IS NOT NULL 
            AND device_number IS NOT NULL 
            AND transaction_datfile_export_date IS NULL";

    $result = mysqli_query($connect, $sql);
    $resultCheck = mysqli_num_rows($result);
                
    $exportDate = date('Y-m-d');

    if($resultCheck > 0){
        $currentdateHeader = date('dmY');
        echo 'HD'.$bankcode.''.$currentdateHeader.''.$currenttime.'2.0'."\r\n";
        while($row = mysqli_fetch_assoc($result)){
            $wallet_number = mysqli_real_escape_string($connect, $row['wallet_number']);
            $device_number = mysqli_real_escape_string($connect, $row['device_number']);
            $fname = mysqli_real_escape_string($connect, $row['fname']);
            $mname = mysqli_real_escape_string($connect, $row['mname']);
            $lname = mysqli_real_escape_string($connect, $row['lname']);

            // remove dash in names
            $lname = str_replace('-', '', $lname);
            $fname = str_replace('-', '', $fname);
            $mname = str_replace('-', '', $mname);
                    
            if($mname == 'N/A' || $mname == 'n/a'){
                  $mname = '';
            }
            if(strpos($mname, 'N/A')|| strpos($mname, 'N/A')){
                 $mname = '';   
            }

            echo $device_number.'|'.$wallet_number.'|0|'.$currentdateHeader.'|U1||000000002000000|608|||000000002000000|608|||||00000000'."\r\n";
        }
        //FOOTER of DAT File
        $numdatas = strlen($resultCheck);
        $zeros = '000000000';
        $footer = substr($zeros, $numdatas).''.$resultCheck;

        echo 'FT|'.$footer;
                
        $sqlUpdateExportDate = "UPDATE tbl_lbp_form SET transaction_datfile_export_date = '".$exportDate."' WHERE 
        date_exported != '' AND application_datfile_export_date IS NOT NULL 
        AND wallet_number IS NOT NULL 
        AND device_number IS NOT NULL 
        AND transaction_datfile_export_date IS NULL";
        mysqli_query($connect, $sqlUpdateExportDate);
    }
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment;filename="'.$filetype.''.$bankcode.''.$currentdate.''.$currenttime.'.dat"');
}





//DOWNLOAD MULTIPLE PDFs --------------------------------------------------------------------------------------

    if(isset($_POST['btn_download'])){
        $batch_number = $_POST['batch_number'];
        $message = '';    
        $zip_export_max_counter;
        $zip_counter = 1;

        $pdf_path = '../../'.$student_portal.'/pdf/Merged/';
//         $file_count_limit = 50;

//         $file_count_limit = $file_count_limit * $batch_number;
//         $file_count_offset = $file_count_limit - 50;

        // execute new select statement for each 50 pdf's
        $sqlDownload50 = "SELECT award_no, pdf_attachment FROM tbl_lbp_form WHERE application_datfile_name ='".$_POST['sel_reexport']."' AND application_datfile_batch = '".$batch_number."'";
        $resDownload50 = mysqli_query($connect, $sqlDownload50);
        $checkDownload50 = mysqli_num_rows($resDownload50);

        while($row=mysqli_fetch_assoc($resDownload50)){
            $pdf_attachment = $row['pdf_attachment'];
            $pdf_attachment = substr($pdf_attachment, 14);
            $pdf_names[] = $pdf_attachment;     
        }
        if(extension_loaded('zip')){
            if(isset($pdf_names) && count($pdf_names)>0){
                $zip = new ZipArchive();
                $zip_name = $_POST['sel_reexport'].'_'.$batch_number.'.zip';
                if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE){
                    echo 'Zip Creation Failed';
                }
                foreach($pdf_names as $pdf){
                    $zip->addFile($pdf_path.$pdf, 'Batch '.$batch_number.'/'.$pdf);
                }
                $zip->close();

                if(file_exists($zip_name)){
                    header('Content-type: application/zip');
                    header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                    
                    readfile($zip_name);

                    unlink($zip_name);
                }
            }
            else{
                $message = 'No Files to Zip';
                header('location:../attachments.php?errmsg='.$message);
            }
        }
        else{
            $message = 'Zip Extension is not Loaded';
            header('location:../attachments.php?errmsg='.$message);
        }  
    }


//EXPORT TEXT FILE ---------------------------------------------------------------------------------------------

    if(isset($_POST['btn_download_text'])){
        $batch_number = $_POST['batch_number'];
        $batch_name = $_POST['sel_reexport'];
        $message = '';
        $text_counter = 1;   
        $branch_code;

        $pdf_path = '../../'.$student_portal.'/pdf/Merged/';
        $file_count_limit = 50;

        $file_count_limit = $file_count_limit * $batch_number;
        $file_count_offset = $file_count_limit - 50;

        echo 'REPORT-ID=UNIFAST'."\r\n\r\n";

        $sqlDownload50 = "SELECT award_no, pdf_attachment, pickup_at_hei, hei_uii, lbp_branch_code, lbp_branch FROM tbl_lbp_form WHERE application_datfile_name ='".$batch_name."' AND application_datfile_batch = '".$batch_number."'";
        $resDownload50 = mysqli_query($connect, $sqlDownload50);
        $checkDownload50 = mysqli_num_rows($resDownload50);
                
        while($row=mysqli_fetch_assoc($resDownload50)){
            $pickup_at_hei = $row['pickup_at_hei'];
            $hei_uii = $row['hei_uii'];
            $lbp_branch_code = $row['lbp_branch_code'];
            $lbp_branch = $row['lbp_branch'];
            $pdf_attachment = $row['pdf_attachment'];

            $pdf_attachment = substr($pdf_attachment, 14);
            $pdf_attachment = str_replace(' .pdf', '.pdf', $pdf_attachment);
            $pdf_attachment = str_replace(' .pdf', '.pdf', $pdf_attachment);
            $pdf_attachment = str_replace(' .pdf', '.pdf', $pdf_attachment);
            $pdf_attachment = str_replace(' .pdf', '.pdf', $pdf_attachment);
            
            if(strlen($text_counter) == 1){
                $batch_number = $batch_number;
            }
            elseif(strlen($text_counter) == 2){
                $batch_number = substr($batch_number, 1);
            }

//             if($pickup_at_hei == '1'){
//                 $sqlSelectHEIUII = "SELECT branch_code FROM tbl_lbp_servicing_branches WHERE hei_uii ='".$hei_uii."'";
//                 $resSelectHEIUII = mysqli_query($connect, $sqlSelectHEIUII);
//                 $checkSelectHEIUII = mysqli_num_rows($resSelectHEIUII);
//                 if($checkSelectHEIUII >= 1){
//                     while($row=mysqli_fetch_assoc($resSelectHEIUII)){
//                         $branch_code = $row['branch_code'];
//                     }
//                 }
//             }
//             else{
//                 $sqlSelectBranchCode = "SELECT branch_code FROM tbl_lbp_branches WHERE branch_name = '".$lbp_branch."'";
//                 $resSelectBranchCode = mysqli_query($connect, $sqlSelectBranchCode);
//                 $checkSelectBranchCode = mysqli_num_rows($resSelectBranchCode);
//                 if($checkSelectBranchCode >= 1){
//                     while($row=mysqli_fetch_assoc($resSelectBranchCode)){
//                         $branch_code = $row['branch_code'];
//                     }
//                 }
//             }

//             if($branch_code == '' || $branch_code == NULL){
//                 $branch_code = ''; 
//             }

            //echo 'FILE=/u01/source/documents/'.date('Ymd').'/BATCH'.$batch_number.'/'.$pdf_attachment.',TYPE=PDF,SECTION='.$branch_code."\r\n".'TOPIC-ID=BRCODE, "TOPIC-ITEM='.$branch_code.'"'."\r\n\r\n";
            echo 'FILE=/u01/source/unifast/'.$pdf_attachment.',TYPE=PDF,SECTION='.$lbp_branch_code."\r\n".'TOPIC-ID=FIELD_UNIT, "TOPIC-ITEM='.$lbp_branch_code.'"'."\r\n\r\n";
        }    
        header('Content-type: text/plain');
        header('Content-Disposition: attachment; filename="BATCH'.$batch_number.'.txt"');
    }


    //UNLOAD MULTIPLE PDFs ----------------------------------------------------------------------

    if(isset($_POST['btn_unload_pdfs'])){
        $batch_number = $_POST['batch_number'];
        $batch_name = $_POST['sel_reexport'];

        $pdf_path = '../../'.$student_portal.'/pdf/Merged/';
        $id_front_path = '../../'.$student_portal.'/image/idfrontupload/';
        $id_back_path = '../../'.$student_portal.'/image/idbackupload/';

        $sqlToBeUnloaded = "SELECT * FROM tbl_lbp_form WHERE application_datfile_name = '".$batch_name."'";
        $resToBeUnloaded = mysqli_query($connect, $sqlToBeUnloaded);
        $checkToBeUnloaded = mysqli_num_rows($resToBeUnloaded);
        if($checkToBeUnloaded > 0){
            $pdf_count = 0;
            while($row = mysqli_fetch_assoc($resToBeUnloaded)){
                $award_no = mysqli_real_escape_string($connect, $row['award_no']);
                $pdf_attachment = mysqli_real_escape_string($connect, $row['pdf_attachment']);
                $db_id_front = mysqli_real_escape_string($connect, $row['id_front_photo']);
                $db_id_back = mysqli_real_escape_string($connect, $row['id_back_photo']);

                $db_id_front = substr($db_id_front,23);
                $db_id_back = substr($db_id_back,22);

                unlink($pdf_path.$award_no.'.pdf');;
                unlink($id_front_path.$db_id_front);
                unlink($id_back_path.$db_id_back);
                $pdf_count++;
            }
            
            $message = 'Succesfully Unloaded '.$pdf_count.' PDF and ID Image File(s)';
            header('location:../attachments.php?sucmsg='.$message);
        }
        else{
            $message = 'Nothing to Unload';
            header('location:../attachments.php?errmsg='.$message);
        }
    }
?>
