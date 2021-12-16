package com.rafli.si_boss;

import android.os.Bundle;
import android.view.WindowManager;
import android.widget.ProgressBar;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;



//@SuppressLint("CustomSplashScreen")
public class SplashScreenActivity extends AppCompatActivity {

    ProgressBar progressBar;
    TextView textView;

        @Override
    protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.splashscreen);

            getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,
                    WindowManager.LayoutParams.FLAG_FULLSCREEN);

            progressBar = findViewById(R.id.progressBar);
            textView = findViewById(R.id.text_view);

            progressBar.setMax(100);
            progressBar.setScaleY(3f);

            progresAnimation();
        }

        public void progresAnimation(){
            ProgressBarAnimation anim = new ProgressBarAnimation(this, progressBar, textView, 0f, 100f);
            anim.setDuration(10000);
            progressBar.setAnimation(anim);
        }
}
//
////        inisialisai handler
//        Handler handler = new Handler();
//
////        Start handler 1 detik
//        handler.postDelayed(() -> {
////          Insialisasi intent ke halaman login
//            Intent loginIntent = new Intent(getApplicationContext(), LoginActivity.class);
//                    startActivity(loginIntent);
//
//            finish();
//        }, 3000l); // Menampilkan splashscreen selama 3 detik


