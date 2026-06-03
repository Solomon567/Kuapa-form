<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  
  $data = [
    "Date" => $_POST['date'] ?? '',
    "Name" => $_POST['name'] ?? '',
    "Sex" => $_POST['sex'] ?? '',
    "DOB" => $_POST['dob'] ?? '',
    "Age" => $_POST['age'] ?? '',
    "District" => $_POST['district'] ?? '',
    "Address" => $_POST['address'] ?? '',
    "Community" => $_POST['community'] ?? '',
    "Phone" => $_POST['phone'] ?? '',
    "ParentName" => $_POST['parent_name'] ?? '',
    "ParentPhone" => $_POST['parent_phone'] ?? '',
    "MaritalStatus" => $_POST['marital_status'] ?? '',
    "Dressmaking_KabaSlit" => $_POST['dress_kaba'] ?? '',
    "Dressmaking_Measuring" => $_POST['dress_measure'] ?? '',
    "Dressmaking_Knitting" => $_POST['dress_knit'] ?? '',
    "Dressmaking_Stitching" => $_POST['dress_stitch'] ?? '',
    "Dressmaking_Bottoms" => $_POST['dress_bottom'] ?? '',
    "Hairdressing_Braiding" => $_POST['hair_braid'] ?? '',
    "Hairdressing_Perming" => $_POST['hair_perm'] ?? '',
    "Hairdressing_Artificial" => $_POST['hair_artificial'] ?? '',
    "Hairdressing_Manicure" => $_POST['hair_manicure'] ?? '',
    "Hairdressing_Pedicure" => $_POST['hair_pedicure'] ?? '',
    "Hairdressing_Pony" => $_POST['hair_pony'] ?? '',
    "Hairdressing_Dreadlocks" => $_POST['hair_dreadlocks'] ?? '',
    "Tiling_Electric" => $_POST['tiling_electric'] ?? '',
    "Tiling_Plumbing" => $_POST['tiling_plumbing'] ?? '',
    "Tiling_Carpentry" => $_POST['tiling_carpentry'] ?? '',
    "Tiling_Masonry" => $_POST['tiling_masonry'] ?? '',
    "Mechanic_Repair" => $_POST['mech_repair'] ?? '',
    "Mechanic_Tools" => $_POST['mech_tools'] ?? '',
    "Mechanic_Electrical" => $_POST['mech_electrical'] ?? ''
  ];

  
  $file = 'submissions.csv';
  $new = !file_exists($file);
  $fp = fopen($file, 'a');
  if($new) fputcsv($fp, array_keys($data)); 
  fputcsv($fp, $data);
  fclose($fp);

  
  $to = "asamoahsolomon0000@gmail.com"; 
  $subject = "New Apprenticeship Form: " . $data['Name'];
  $message = "New submission received:\n\n";
  foreach($data as $key => $value) {
    $message .= $key . ": " . $value . "\n";
  }
  $headers = "From: noreply@yourwebsite.com";
  mail($to, $subject, $message, $headers);

  // 3. Redirect to thank you page
  header("Location: thank-you.html");
  exit;
  
} else {
  echo "Invalid request";
}
?>