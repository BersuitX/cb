<?php
   $V15n5s0stf3g = 0;
   if($Vrqs4xzp4h4g == "1"){
      $V15n5s0stf3g = 1;
   }
?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v1="http://www.americamovil.com/schema/namespace/AccountManagement/v1">
   <soapenv:Header/>
   <soapenv:Body>
      <v1:updateCustomerData>
         <LineOfBusiness><?=$Vrqs4xzp4h4g?></LineOfBusiness>
         <AccountId><?=$V3hbf4so4iko?></AccountId>
         <CustomerData>
            <CustomerId><?=$Vcfrropha2x1?></CustomerId>
            <Name><?=$V0vzw0fpvl1p?></Name>
            <LastName><?=$Vymlg3fszicp?></LastName>
            <DocumentType><?=$Vcfzis3ca5nv?></DocumentType>
            <DocumentNumber><?=$Vbbhadzcf3q5?></DocumentNumber>
            <HomePhoneNumberIndicative><?=$Vj2eqdvvlipj?></HomePhoneNumberIndicative>
            <HomePhoneNumber><?=$Viudnwh041h3?></HomePhoneNumber>
            <OfficePhoneNumberIndicative><?=$Vktnenraiv2y?></OfficePhoneNumberIndicative>
            <OfficePhoneNumber><?=$Vs531vu3v34a?></OfficePhoneNumber>
            <MobileNumber><?=$Va3r2k5goagw?></MobileNumber>
            <EmailAddress><?=$Va1hf2qjcehx?></EmailAddress>
               <Address>
                  <Address><?=$Vala1hnrwvp3["Address"]?></Address>
                  <District><?=$Vala1hnrwvp3["District"]?></District>
                  <DepartmentId><?=$Vala1hnrwvp3["DepartmentId"]?></DepartmentId>
                  <Department><?=$Vala1hnrwvp3["Department"]?></Department>
                  <CityId><?=$Vala1hnrwvp3["CityId"]?></CityId>
                  <City><?=$Vala1hnrwvp3["City"]?></City>
                  <CityDepartment><?=$Vala1hnrwvp3["CityDepartment"]?></CityDepartment>
               </Address>
               <InstallationAddress>
                  <Address><?=$V3mvvwcubegf["Address"]?></Address>
                  <District><?=$V3mvvwcubegf["District"]?></District>
                  <DepartmentId><?=$V3mvvwcubegf["DepartmentId"]?></DepartmentId>
                  <Department><?=$V3mvvwcubegf["Department"]?></Department>
                  <CityId><?=$V3mvvwcubegf["CityId"]?></CityId>
                  <City><?=$V3mvvwcubegf["City"]?></City>
                  <CityDepartment><?=$V3mvvwcubegf["CityDepartment"]?></CityDepartment>
               </InstallationAddress>
         </CustomerData>
      </v1:updateCustomerData>
   </soapenv:Body>
</soapenv:Envelope>

