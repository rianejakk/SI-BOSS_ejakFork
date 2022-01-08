package com.rafli.si_boss;

import android.os.Bundle;
import android.widget.ProgressBar;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import com.rafli.si_boss.api.ApiClient;
import com.rafli.si_boss.api.ApiInterface;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import java.util.List;

public class search_result extends AppCompatActivity {

    private RecyclerView recyclerView;
    private RecyclerView.LayoutManager layoutManager;
    public static List<Bus> busResultList;
    private RecyclerView.Adapter adapter;
    private ApiInterface apiInterface;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.result_search);

        busResultList = findViewById(R.id.recycle_bus);
        layoutManager = new LinearLayoutManager(this);
        recyclerView.setLayoutManager(layoutManager);
        recyclerView.setHasFixedSize(true);


    }
    public void getJson(String a, String b) {

        apiInterface = ApiClient.getClient().create(ApiInterface.class);
        Call<Bus> call = apiInterface.getBusFromDB(a, b);
        call.enqueue(new Callback<Bus>() {
            @Override
            public void onResponse(Call<Bus> call, Response<Bus> response) {
                busResultList = response.body();
                adapter = new BusAdapter()
            }

            @Override
            public void onFailure(Call<Bus> call, Throwable t) {

            }
        });
    }
}