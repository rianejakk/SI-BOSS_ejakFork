package com.rafli.si_boss;

import android.content.Context;
import android.view.View;
import android.view.ViewGroup;
import android.view.LayoutInflater;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;
import com.rafli.si_boss.Bus;
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
        holder.details.setText(busList.get(position).getDetail_bus());
    }

    @Override
    public int getItemCount() {
        return busList.size();
    }

    public static class BusViewHolder extends RecyclerView.ViewHolder {
        TextView busName, details;
        public BusViewHolder(View view) {
            super(view);

            busName = view.findViewById(R.id.busName);
            details = view.findViewById(R.id.detail_bus);

        }

    }
}
