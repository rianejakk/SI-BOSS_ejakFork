package com.rianezza.recycleview;

import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import java.util.ArrayList;

public class modlistRecycleView_adapter extends RecyclerView.Adapter<modlistRecycleView_adapter.modlistViewHolder> {
    ArrayList<modlist> mods;

    public modlistRecycleView_adapter(ArrayList<modlist> mods) {
        this.mods = mods;
    }

    @NonNull
    @Override
    public modlistRecycleView_adapter.modlistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View look = LayoutInflater.from(parent.getContext()).inflate(R.layout.mod_item, parent, false);
        return new modlistViewHolder(look);
    }

    @Override
    public void onBindViewHolder(@NonNull modlistRecycleView_adapter.modlistViewHolder holder, int position) {
        final modlist daftar_mod = mods.get(position);

        holder.forTitle.setText(daftar_mod.getTitle());
        holder.forCategory.setText(daftar_mod.getCategory());
        holder.forReleaseDate.setText(daftar_mod.getRelease_date());

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(holder.itemView.getContext(), modDetails_activity.class);
                intent.putExtra("MODS", daftar_mod);
                holder.itemView.getContext().startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mods.size();
    }

    public class modlistViewHolder extends RecyclerView.ViewHolder {
        TextView forTitle, forCategory, forReleaseDate;

        public modlistViewHolder(@NonNull View itemView) {
            super(itemView);
            forTitle = itemView.findViewById(R.id.mod_title);
            forCategory = itemView.findViewById(R.id.category);
            forReleaseDate = itemView.findViewById(R.id.release_date);


        }
    }
}
