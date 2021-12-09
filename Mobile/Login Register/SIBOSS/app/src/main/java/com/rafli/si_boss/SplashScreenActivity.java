package com.rafli.si_boss;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;

import androidx.appcompat.app.AppCompatActivity;

@SuppressLint("CustomSplashScreen")
public class SplashScreenActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.splashscreen);

//        inisialisai handler
        Handler handler = new Handler();

//        Start handler 1 detik
        handler.postDelayed(() -> {
//          Insialisasi intent ke halaman login
            Intent loginIntent = new Intent(getApplicationContext(), LoginActivity.class);
                    startActivity(loginIntent);

            finish();
        }, 3000l); // Menampilkan splashscreen selama 3 detik
    }
}

