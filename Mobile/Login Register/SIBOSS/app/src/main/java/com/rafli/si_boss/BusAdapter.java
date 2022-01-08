package com.rafli.si_boss;

import android.content.Context;
import android.view.View;
import android.view.ViewGroup;
import android.view.LayoutInflater;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import java.util.List;

public class BusAdapter extends RecyclerView.Adapter<BusAdapter.BusViewHolder> {

    private Context context;
    private List<Bus> busList;

    public BusAdapter(Context context, List<Bus> busList) {
        this.context = context;
        this.busList = busList;
    }

    @Override
    public BusViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.result_item, parent, false);
        return new BusViewHolder(view);
    }

    @Override
    public void onBindViewHolder(BusAdapter.BusViewHolder holder, int position) {
        holder.busName.setText(busList.get(position).getNama_bus());
        holder.berangkat_time.setText(busList.get(position).getBerangkat_time());
        holder.berangkat_place.setText(busList.get(position).getBerangkat_place());
        holder.arrival_time.setText(busList.get(position).getTiba_time());
        holder.arrival_place.setText(busList.get(position).getTiba_place());
        holder.price.setText(busList.get(position).getHarga_bus());
    }

    @Override
    public int getItemCount() {
        return busList.size();
    }

    public static class BusViewHolder extends RecyclerView.ViewHolder {
        TextView busName, berangkat_time, arrival_time, berangkat_place, arrival_place, price;
        public BusViewHolder(View view) {
            super(view);

            busName = view.findViewById(R.id.busName);
            berangkat_time = view.findViewById(R.id.berangkat_time);
            berangkat_place = view.findViewById(R.id.berangkat);
            arrival_time = view.findViewById(R.id.arrival_date);
            arrival_place = view.findViewById(R.id.tiba);
            price = view.findViewById(R.id.price);

        }
    }
}
