using System.Collections.Generic;
using System.Data.SqlClient;

namespace palooza.data.Repo
{
    public interface IPaloozaRepository <T> 
    {
        IEnumerable<T> List();
        void Save(T obj);
        void Save(IEnumerable<T> obj);
        void Delete(T obj);
        void Delete(IEnumerable<T> obj);
    }
}