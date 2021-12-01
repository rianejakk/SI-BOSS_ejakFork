package com.rianezza.si_boss;

import android.annotation.SuppressLint;
import android.database.sqlite.SQLiteOpenHelper;

import java.sql.Connection;

public class DatabaseHelper {
    Connection conn;
    String ip, port, db, un, pass;

    @SuppressLint("NewApi")
    public Connection connClass() {
        ip = "localhost";
    }
}
