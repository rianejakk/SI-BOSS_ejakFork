package com.rianezza.recycleview;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.os.Bundle;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    RecyclerView recyclerView;
    modlistRecycleView_adapter adapter;
    ArrayList<modlist> modlistArrayList = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        recyclerView = findViewById(R.id.recycle_view);

        modlistArrayList.add(new modlist("Just Enough Items (JEI)", "Nov 24, 2015", "mezz","Map and Information, API and Library", "JEI is an item and recipe viewing mod for Minecraft, built from the ground up for stability and performance."));
        modlistArrayList.add(new modlist("JourneyMap", "Sep 20, 2011", "techbrew", "Map and Information", "JourneyMap is a client+server mod for Forge which maps your Minecraft world in real-time as you explore. You can view the map in a web browser or in-game as a Minimap or full-screen."));
        modlistArrayList.add(new modlist("Mouse Tweaks", "Jun 25, 2013", "YaLTeR", "Miscellaneous, Storage", "Mouse Tweaks replaces the standard RMB dragging mechanic, adds two new LMB dragging mechanics and an ability to quickly move items with the scroll wheel."));

        adapter = new modlistRecycleView_adapter(modlistArrayList);
        recyclerView.setAdapter(adapter);
        recyclerView.setLayoutManager(new LinearLayoutManager(MainActivity.this));
    }
}