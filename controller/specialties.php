<?php
require("model/specialties.php");

$modelSpecialties = new Specialties;

$specialties = $modelSpecialties->get();

require("view/specialties.php");

