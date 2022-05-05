package com.example.classproject;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.app.DatePickerDialog;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Calendar;
import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener{

    EditText txtID, txtName, txtAge, txtDate, txtCountry, txtCell;
    RadioGroup gender_group;
    RadioButton genderSelected;
    Spinner spinner;
    Button btnAdd, btnExit;
    String selectedSpinner;
    DatePickerDialog datePickerDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        spinner = findViewById(R.id.divSpinner);
        ArrayAdapter<CharSequence>adapter =ArrayAdapter.createFromResource(this,R.array.spinner, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);
        spinner.setOnItemSelectedListener(this);

        gender_group = findViewById(R.id.gender_group);
        genderSelected = gender_group.findViewById(gender_group.getCheckedRadioButtonId());

        txtID = findViewById(R.id.txtID);
        txtName = findViewById(R.id.txtName);
        txtAge = findViewById(R.id.txtAge);
        txtDate = findViewById(R.id.txtDate);
        txtCountry = findViewById(R.id.txtCountry);
        txtCell = findViewById(R.id.txtCell);
//

        txtDate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Calendar calendar= Calendar.getInstance();
                int year = calendar.get(Calendar.YEAR);
                int month = calendar.get(Calendar.MONTH);
                int day = calendar.get(Calendar.DAY_OF_MONTH);

                datePickerDialog = new DatePickerDialog(MainActivity.this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker datePicker, int i, int i1, int i2) {

              txtDate.setText(year+"-"+month+"-"+day);
                    }
                },year,month,day);
          datePickerDialog.show();
            }
        });

        //

        btnAdd = findViewById(R.id.btnAdd);
        btnExit = findViewById(R.id.btnExit);

        btnAdd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                addData();

            }
        });


btnExit.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View view) {

     finish();

    }
});
    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
      selectedSpinner = parent.getItemAtPosition(position).toString();
       // Toast.makeText(this, selectedSpinner, Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onNothingSelected(AdapterView<?> adapterView) {

    }


    public void addData() {


String httpURL = "https://proto-website.000webhostapp.com/insert.php";
        String id = txtID.getText().toString();
        String name = txtName.getText().toString();
        String age = txtAge.getText().toString();
        String date = txtDate.getText().toString();
        String country = txtCountry.getText().toString();
        String cell = txtCell.getText().toString();
        String gender = genderSelected.getText().toString();
        String status = selectedSpinner;




        if (id.isEmpty()) {
            Toast.makeText(this, "Ingresa tu ID", Toast.LENGTH_SHORT).show();
        }
        if (name.isEmpty()) {
            Toast.makeText(this, "Ingresa tu Nombre", Toast.LENGTH_SHORT).show();
        }
        else if (age.isEmpty()) {
            Toast.makeText(this, "Ingresa tu Edad", Toast.LENGTH_SHORT).show();
        }
        else if (date.isEmpty()) {
            Toast.makeText(this, "Fecha de Disponibilidad", Toast.LENGTH_SHORT).show();
        }
        else if (country.isEmpty()) {
            Toast.makeText(this, "Ingresa tu Estado", Toast.LENGTH_SHORT).show();
        }
        else if (cell.isEmpty()) {
            Toast.makeText(this, "Ingresa tu Teléfono", Toast.LENGTH_SHORT).show();
        }
        else {

            //JSON CODE
            JSONObject covid = new JSONObject();
            try {
                covid.put("id",id);
                covid.put("name",name);
                covid.put("age",age);
                covid.put("dateReg",date);
                covid.put("country",country);
                covid.put("cell",cell);
                covid.put("gender",gender);
                covid.put("status",status);

            } catch (JSONException e) {
                // TODO Auto-generated catch block
                  e.printStackTrace();
            }

    String covidJSON = covid.toString();
             //


            StringRequest stringRequest = new StringRequest(Request.Method.POST, httpURL,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String response) {
                            Toast.makeText(MainActivity.this,response,Toast.LENGTH_LONG).show();
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError error) {
                            Toast.makeText(MainActivity.this,error.toString(),Toast.LENGTH_LONG).show();
                        }
                    }){
                @Override
                protected Map<String,String> getParams(){
                    Map<String,String> params = new HashMap<String, String>();
                    params.put("id",id);
                    params.put("name",name);
                    params.put("age",age);
                    params.put("dateReg",date);
                    params.put("country",country);
                    params.put("cell",cell);
                    params.put("gender",gender);
                    params.put("status",status);
                   params.put("jsonCovid",covidJSON);
                    return params;
                }

            };

            RequestQueue requestQueue = Volley.newRequestQueue(this);
            requestQueue.add(stringRequest);


        }

            //  Toast.makeText(this, "Haq" + selectedSpinner + "radio check " + genderSelected.getText().toString(), Toast.LENGTH_SHORT).show();
        }

        }
