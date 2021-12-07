package com.rafli.si_boss.model;

import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.RecyclerView;

public class search_result extends AppCompatActivity {

    RecyclerView bus;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.result_search);

        bus = findViewById(R.id.recycle_bus);

    }
}