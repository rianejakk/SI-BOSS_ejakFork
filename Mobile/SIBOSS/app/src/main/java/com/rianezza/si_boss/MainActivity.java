package com.rianezza.si_boss;

import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Locale;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Button search_btn = findViewById(R.id.cari);
        search_btn.setOnClickListener(view -> {
            Intent i = new Intent(getApplicationContext(), search_result.class);
            startActivity(i);
        });

        final Calendar newCalendar = Calendar.getInstance();
        EditText datepicker = findViewById(R.id.pergi_edit);
        DatePickerDialog.OnDateSetListener date = new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {
                newCalendar.set(Calendar.YEAR, year);
                newCalendar.set(Calendar.MONTH, monthOfYear);
                newCalendar.set(Calendar.DAY_OF_MONTH, dayOfMonth);
                updateLabel();
            }
            private void updateLabel() {
                String myFormat = "MM/dd/yy";
                SimpleDateFormat sdf = new SimpleDateFormat(myFormat, Locale.US);

                datepicker.setText(sdf.format(newCalendar.getTime()));
            }
        };
        datepicker.setOnClickListener(view -> new DatePickerDialog(MainActivity.this, date, newCalendar.get(Calendar.YEAR),
                newCalendar.get(Calendar.MONTH), newCalendar.get(Calendar.DAY_OF_MONTH)).show());

        final Calendar calendar_back = Calendar.getInstance();
        EditText date_back = findViewById(R.id.pulang_edit);
        DatePickerDialog.OnDateSetListener date2 = new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {
                calendar_back.set(Calendar.YEAR, year);
                calendar_back.set(Calendar.MONTH, monthOfYear);
                calendar_back.set(Calendar.DAY_OF_MONTH, dayOfMonth);
                updateLabel();
            }
            private void updateLabel() {
                String myFormat = "MM/dd/yy";
                SimpleDateFormat sdf = new SimpleDateFormat(myFormat, Locale.US);
                date_back.setText(sdf.format(calendar_back.getTime()));
            }
        };
        date_back.setOnClickListener(view -> new DatePickerDialog(MainActivity.this, date2, calendar_back.get(Calendar.YEAR),
                calendar_back.get(Calendar.MONTH), calendar_back.get(Calendar.DAY_OF_MONTH)).show());
    }
}