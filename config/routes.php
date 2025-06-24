<?php

return [
    // =======================
    // APP ROUTES
    // =======================
    "/" => ["template" => "_app/pages/index"],

    // =======================
    // ADMIN ROUTES
    // =======================
    "/admin" => ["template" => "_admin/pages/index"],
    "/admin/drinks" => ["template" => "_admin/pages/drinks"],
    "/admin/competitions" => ["template" => "_admin/pages/competitions"],
];
