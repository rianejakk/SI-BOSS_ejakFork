package com.rianezza.recycleview;

import androidx.appcompat.app.AppCompatActivity;
import androidx.arch.core.executor.TaskExecutor;

import android.os.Bundle;
import android.widget.TextView;

public class modDetails_activity extends AppCompatActivity {

    TextView forTitle, forReleaseDate, forCreator, forCategory, forDescription;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mod_details);

        forTitle = findViewById(R.id.mod_title);
        forReleaseDate = findViewById(R.id.release_date);
        forCreator = findViewById(R.id.creator);
        forDescription = findViewById(R.id.description);
        forCategory = findViewById(R.id.category);

        modlist obj_modlist = getIntent().getParcelableExtra("MODS");
        forTitle.setText(obj_modlist.getTitle());
        forReleaseDate.setText(obj_modlist.getRelease_date());
        forCategory.setText(obj_modlist.getCategory());
        forCreator.setText(obj_modlist.getCreator());
        forDescription.setText(obj_modlist.getDescription());
    }
}