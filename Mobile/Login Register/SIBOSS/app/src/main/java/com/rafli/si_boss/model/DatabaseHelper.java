package com.rafli.si_boss.model;

import android.annotation.SuppressLint;

import java.sql.Connection;

public class DatabaseHelper {
    Connection conn;
    String ip, port, db, un, pass;

    @SuppressLint("NewApi")
    public Connection connClass() {
        ip = "localhost";
    }
}
