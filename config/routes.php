<?php

return [
    // =======================
    // AUTH ROUTES
    // =======================
    // "/auth/login" => ["template" => "_auth/pages/login"],

    // =======================
    // APP ROUTES
    // =======================
    "/" => ["template" => "_app/pages/competitions/index"],
    "/drinks" => ["template" => "_app/pages/drinks/index"],


    // =======================
    // ADMIN ROUTES
    // =======================
    "/admin" => ["template" => "_admin/pages/index"],
    "/admin/drinks" => ["template" => "_admin/pages/drinks"],
    "/admin/competitions" => ["template" => "_admin/pages/competitions"],
];
